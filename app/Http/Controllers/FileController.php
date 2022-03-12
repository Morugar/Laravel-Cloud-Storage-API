<?php

namespace App\Http\Controllers;


use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create(Request $request, int $folder_id = 0)
    {
        $data = $request->all();
        $rules = [
            'name' => 'required',
            'api_token' => 'required',
            'file' => 'required'
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
        $user = User::where('api_token', $data['api_token'])->first();
        $nameCheck = File::where('name', $data['name'])->first();
        if(!$nameCheck) {
            $name = $data['name'];
        }
        else {
            $name = $data['name'].'-'.uniqid();
        }
        $destination_path = 'public/uploads';
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $path = $request->file('file')->storeAs($destination_path, $file_name);
        $model = [
            'name' => $name,
            'folder_id' => $folder_id,
            'author_id' => $user['user_id'],
            'url' => $path
        ];
        File::create($model);
        return response()->json([
            'data' =>[
                'code' => 200,
                'message' => 'Success',
                'file' => $model
            ]
        ], 200);
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
