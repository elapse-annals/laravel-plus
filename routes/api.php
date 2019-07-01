<?php

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

Route::middleware('auth:api')->get('/user', 'ClosureController@user');
Route::prefix('test')->group(function () {
    Route::any('test', 'testController@test');
    Route::get('exception', 'testController@exception');
});
Route::apiResource('temps', 'TempController');
