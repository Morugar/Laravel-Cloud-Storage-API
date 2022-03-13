<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{

    public function register(Request $request) {
        $data = $request->all();
        $rules = [
            'login' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:5'
        ];
        $validator = Validator::make($data, $rules);
        if($validator->fails()) {
            return response()->json([
                'data' => [
                    'code' => 422,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ]
            ], 422);
        }
        else {
            $model = [
                'login' => $data['login'],
                'email' => $data['email'],
                'password' => $data['password'],
                'api_token' => uniqid().uniqid()
            ];
            User::create($model);
            return response()->json([
                'data' => [
                    'message' => 'Successful Registration',
                    'code' => 200
                ]
            ], 200);
        }
    }

    public function login(Request $request) {
        $data = $request->all();
        $rules = [
            'login' => 'required|string',
            'password' => 'required|string|min:5'
        ];
        $validator = Validator::make($data, $rules);
        if($validator->fails()) {
            return response()->json([
                'data' => [
                    'code' => 422,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ]
            ], 422);
        }
        else {
            $user = User::where('login', $data['login'])->first();
            if(!$user || $user['password'] != $data['password']) {
                return response()->json([
                    'data' => [
                        'code' => 401,
                        'message' => 'Invalid login or password',
                    ]
                ], 401);
            }
            else {
                return response()->json([
                    'data' => [
                        'code' => 200,
                        'message' => 'Successful Auth',
                        'token' => $user['api_token']
                    ]
                ], 200);
            }
        }
    }
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
