<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('post/',[\App\Http\Controllers\PostController::class,'indexPost']);
Route::get('post/{postId}',[\App\Http\Controllers\PostController::class,'viewPost']);
Route::post('post/',[\App\Http\Controllers\PostController::class,'createPost']);
Route::put('post/{postId}',[\App\Http\Controllers\PostController::class,'updatePost']);
Route::delete('post/{postId}',[\App\Http\Controllers\PostController::class,'deletePost']);
