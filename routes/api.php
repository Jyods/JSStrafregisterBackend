<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
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

Route::prefix('/files')->controller(FileController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/id/{id}', 'getid');
    Route::post('/create', 'store');
});

Route::prefix('/entries')->controller(EntryController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'id');
    Route::post('/create', 'store');
    Route::put('/{id}', 'App\Http\Controllers\EntryController@update');
    Route::delete('/{id}', 'App\Http\Controllers\EntryController@destroy');
});

Route::prefix('/case')->controller(CaseController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'id');
    Route::post('/', 'App\Http\Controllers\CaseController@store');
    Route::put('/{id}', 'App\Http\Controllers\CaseController@update');
    Route::delete('/{id}', 'App\Http\Controllers\CaseController@destroy');
});

Route::prefix('members')->controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'id');
    Route::post('/', 'App\Http\Controllers\UserController@store');
    Route::put('/{id}', 'App\Http\Controllers\UserController@update');
    Route::delete('/{id}', 'App\Http\Controllers\UserController@destroy');
});

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
    Route::get('/user', 'user');
    Route::get('auth', 'auth');
});