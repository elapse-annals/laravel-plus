<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'ClosureController@welcome');

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('plural/{singular}', 'StringController@plural');

Route::prefix('login')->group(function () {
    Route::get('google', 'Auth\LoginController@redirectToProvider');
    Route::get('google/callback', 'Auth\LoginController@handleProviderCallback');
});

/**
 * Export routing registration
 */
Route::prefix('export')->group(function () {
    Route::get('tmpls', 'TmplController@export');
});

/**
 * Resource route
 */
Route::resource('languages', 'LanguageController');

Route::get('testQueryDb', 'TmplController@testQueryDb');



Route::resource('tmpls', 'TmplController');



