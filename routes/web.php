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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('plural/{singular}', 'StringPresenter@plural');

Route::prefix('export')->group(function(){
    Route::get('temps', 'TempController@export');
});

Route::prefix('test')->group(function () {
    Route::get('exception', 'testController@exception');
    Route::any('test', 'testController@test');
});

Route::resource('temps', 'TempController');

Route::resource('infos', 'InfoController');
