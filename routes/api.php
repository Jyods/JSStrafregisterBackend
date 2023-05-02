<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\EntryController;

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

Route::prefix('/files')->controller(EntryController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'id');
    Route::post('/', 'App\Http\Controllers\FileController@store');
    Route::put('/{id}', 'App\Http\Controllers\FileController@update');
    Route::delete('/{id}', 'App\Http\Controllers\FileController@destroy');
});
