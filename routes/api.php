<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('login', [\App\Http\Controllers\UserController::class, 'login']);
Route::post('folder', [\App\Http\Controllers\FolderController::class, 'create']);
Route::post('share', [\App\Http\Controllers\FolderController::class, 'share']);
Route::get('folder/{folder_id?}', [\App\Http\Controllers\FolderController::class, 'index']);
Route::post('folder/{folder_id?}/file', [\App\Http\Controllers\FileController::class, 'create']);
