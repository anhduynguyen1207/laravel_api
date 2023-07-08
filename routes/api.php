<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersVuejsController;
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



Route::prefix('v1')->group(function () {
    Route::resource('customer', App\Http\Controllers\Api\v1\CustomerController::class)->except(['edit', 'create']);
    Route::resource('category', App\Http\Controllers\Api\v1\CategoryPostController::class);

    Route::resource('post', App\Http\Controllers\Api\v1\PostController::class);

    Route::resource('danhmuc', App\Http\Controllers\Api\v1\DanhmucController::class);
    Route::resource('bai-viet', App\Http\Controllers\Api\v1\BaivietController::class);
});

Route::prefix('v2')->group(function () {
    Route::resource('customer', App\Http\Controllers\Api\v2\CustomerController::class)->only(['show']);
});

Route::middleware('auth:api')->get('/imoney', function (Request $request) {
    return $request->userVue();
});

Route::post('/login', [AuthController::class, 'login']);
Route::group(['prefix' => 'auth'], function () {

    Route::post('signup', [AuthController::class, 'signup']);
    // Route::group(['middleware' => 'auth:api'], function () {
    //     Route::get('logout', 'AuthController@logout');
    //     Route::get('user', 'AuthController@user');
    // });
});

Route::get('uservuejs/{email}/{pass}', [UsersVuejsController::class, 'show']);

Route::get('uservuejs/{id}', [UsersVuejsController::class, 'show']);

Route::get('usersvuejs', [UsersVuejsController::class, 'index']);
Route::get('/usersvuejs/create', [UsersVuejsController::class, 'create']);

Route::post('/usersvuejs', [UsersVuejsController::class, 'store']);
Route::get('/usersvuejs/{id}/edit', [UsersVuejsController::class, 'edit']);
Route::put('/usersvuejs/{id}', [UsersVuejsController::class, 'update']);
