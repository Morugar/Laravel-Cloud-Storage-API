<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use App\Models\FoldersCoauthors;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */

    public function share(Request $request)
    {
        $data = $request->all();
        $rules = [
            'user_id' => 'required',
            'folder_id' => 'required',
            'api_token' => 'required'
        ];
        $validator = Validator::make($data, $rules);
        if($validator->fails()) {
            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ]
            ], 422);
        }
        else {
            $author = User::where('api_token', $data['api_token'])->first();
            $folder = Folder::where('folder_id', $data['folder_id'])->first();
            $shareCheck = FoldersCoauthors::where('user_id', $author['user_id'])->where('folder_id', $folder['folder_id'])->first();
            if($author['user_id'] != $folder['author_id']) {
                if(!$shareCheck) {
                    return response()->json([
                        'error' => [
                            'code' => 401,
                            'message' => 'No Permissions',
                            'errors' => 'lox'
                        ]
                    ], 401);
                }
            }
            else {
                $model = [
                    'user_id' => $data['user_id'],
                    'folder_id' => $data['folder_id']
                ];
                FoldersCoauthors::create($model);
                return response()->json([
                    'error' => [
                        'code' => 200,
                        'message' => 'Success',
                        'shared' => $model
                    ]
                ], 200);
            }
        }
    }

    public function index(Request $request, int $folder_id = 0)
    {
        $data = $request->all();

        $user = User::where('api_token', $data['api'])->first();

        $folder = Folder::where('folder_id', $folder_id)->first();
        $files = File::where('folder_id', $folder['folder_id'])->get();
        if($folder['author_id'] == $user['user_id']) {
                return response()->json([
                    'data' => [
                        'code' => 200,
                        'files' => $files
                    ]
                ], 200);
            }
        else {
            $shareCheck = FoldersCoauthors::where('user_id', $user['user_id'])->where('folder_id', $folder['folder_id'])->first();
            if(!$shareCheck) {
                return response()->json([
                    'error' => [
                        'code' => 401,
                        'message' => 'Permission Error'
                    ]
                ], 401);
            }
            else {
                return response()->json([
                    'data' => [
                        'code' => 200,
                        'files' => $files
                    ]
                ], 200);
            }
            }
        }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $rules = [
            'name' => 'string|required',
            'api_token' => 'required'
        ];
        $validator = Validator::make($data, $rules);
        if($validator->fails()) {
            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ]
            ], 422);
        }
        else {
            if(!$data['parent_id']) {
                $parent_id = 0;
            }
            else {
                $parent_id = $data['parent_id'];
            }
            $user = User::where('api_token', $data['api_token'])->first();
            if(!$user) {
                return response()->json([
                    'error' => [
                        'code' => 401,
                        'message' => 'Invalid token',
                    ]
                ], 401);
            }
            $nameCheck = Folder::where('name', $data['name'])->first();
            $name = null;
            if(!$nameCheck) {
                $name = $data['name'];
            }
            else {
                $temp = $data['name'];
                $name = $temp.'-'.uniqid();
            }
            $model = [
                'name' => $name,
                'parent_id' => $parent_id,
                'author_id' => $user['user_id']
            ];
            Folder::create($model);
            return response()->json([
                'data' => [
                    'code' => 200,
                    'message' => 'Success.',
                    'folder' => $model
                ]
            ], 200);
        }
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
