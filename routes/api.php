<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
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

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->prefix('note')->group(function (){
    Route::post('insert',[NoteController::class,'create']);
    Route::get('list',[NoteController::class,'list']);
    Route::prefix('{note}')->group(function(){
        Route::get('get',[NoteController::class,'get']);
        Route::put('update',[NoteController::class,'update']);

    });

});
