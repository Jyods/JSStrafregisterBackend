<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LawController;
use App\Http\Controllers\FileLawController;
use App\Http\Controllers\RankController;

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
    $user = $request->user();
    $data = [
        'user' => $user,
        'rank' => $user->rank,
    ];
    return $user;
});


Route::prefix('/files')->controller(FileController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/id/{id}', 'getid')->middleware('auth:sanctum');
    Route::post('/create', 'store')->middleware('auth:sanctum');
});

Route::prefix('/entries')->controller(EntryController::class)->group(function () {
    Route::get('/index', 'index')->middleware('auth:sanctum');
    Route::get('/index/{id}', 'id')->middleware('auth:sanctum');
    Route::post('/create', 'store');
    Route::put('/{id}', 'App\Http\Controllers\EntryController@update');
    Route::delete('/{id}', 'App\Http\Controllers\EntryController@destroy');
    Route::get('/onlyEntry', 'onlyEntry')->middleware('auth:sanctum');
});

Route::prefix('/law')->controller(LawController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'id');
    Route::post('/', 'App\Http\Controllers\LawController@store');
    Route::put('/{id}', 'App\Http\Controllers\LawController@update');
    Route::delete('/{id}', 'App\Http\Controllers\LawController@destroy');
});

Route::prefix('/filelaw')->controller(FileLawController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'id');
    Route::post('/', 'store');
    Route::put('/{id}', 'App\Http\Controllers\FileLawController@update');
    Route::delete('/{id}', 'App\Http\Controllers\FileLawController@destroy');
});

Route::prefix('/case')->controller(CaseController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'id');
    Route::post('/', 'App\Http\Controllers\CaseController@store');
    Route::put('/{id}', 'App\Http\Controllers\CaseController@update');
    Route::delete('/{id}', 'App\Http\Controllers\CaseController@destroy');
});

Route::prefix('members')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->middleware('auth:sanctum');
    Route::get('/{id}', 'id')->middleware('auth:sanctum');
    Route::put('/', 'update')->middleware('auth:sanctum');
    Route::delete('/{id}', 'App\Http\Controllers\UserController@destroy');
});

Route::prefix('')->controller(LoginController::class)->group(function () {
    Route::post('login', 'login')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    Route::get('auth', 'checkAuth')->middleware('auth:sanctum');
    Route::get('logout', 'logout')->middleware('auth:sanctum');
    Route::get('secure', 'secureSite')->middleware('auth:sanctum');
    Route::get('getPermissions', 'getRestrictionClass')->middleware('auth:sanctum');
    Route::post('register', 'register')->middleware('auth:sanctum');
    Route::get('switchActive/{id}', 'switchActive')->middleware('auth:sanctum');
});

Route::prefix('/ranks')->controller(RankController::class)->group(function () {
    Route::get('/', 'index');
});