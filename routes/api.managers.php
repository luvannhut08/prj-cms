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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('info', 'AuthenController@getInfo');
    Route::post('logout', 'AuthenController@logout');

    // Category
    Route::apiResource('categorys', 'CategoryController')->only(['index', 'store', 'show', 'update', 'destroy']);

    Route::group(['middleware' => 'role:A'], function () {
        Route::apiResource('user', 'UserControler')->only(['index', 'show']);
    });
});

Route::post('login', 'AuthenController@login');
