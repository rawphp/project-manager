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

Route::namespace('Api\V1')->prefix('v1')->name('api.v1.')->group(
    function () {
        Route::post('/login', 'AuthController@login')->name('login');
        Route::get('/logout', 'AuthController@logout')->name('logout');

        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/current-user', 'UserController@current')->name('users.current');

            Route::apiResource('users', 'UserController');
            Route::apiResource('projects', 'ProjectController');
            Route::apiResource('tasks', 'TaskController');
        });
    }
);
