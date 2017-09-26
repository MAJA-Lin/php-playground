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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function () {
    phpinfo();
});

Route::group(['prefix' => 'performance'], function () {
    Route::get('/{type}', 'ModernPHPController@showPerformance');
});

Route::group(['prefix' => 'refactor'], function () {
    Route::get('/{type}', 'ModernPHPController@showRefactor');
});
