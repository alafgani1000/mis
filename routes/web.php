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
Route::group(['middleware' => ['auth']], function () {

    Route::resource('request', 'RequestController');
    Route::get('reqquest/{request}/boss/approval','RequestController@bossview')->name('boss.view');

    Route::get('', 'RequestController@index')->name('home');

});

