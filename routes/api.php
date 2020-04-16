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

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'ilu'], function () {
        Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
            Route::post('login', 'AuthController@login');
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
            Route::post('register', 'AuthController@register');
            Route::post('me', 'AuthController@me');
        });
        Route::group(['middleware' => 'api', 'prefix' => 'room'], function ($router) {
            Route::get('idx', 'RoomController@index');
            Route::post('str', 'RoomController@store');
        });
        Route::group(['middleware' => 'api', 'prefix' => 'cand'], function ($router) {
            Route::get('idx', 'CandidateController@index');
            Route::post('str', 'CandidateController@store');

        });
    });
});
