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

    Route::get('request/{request}/boss/form','RequestController@bossview')->name('boss.view');
    Route::put('request/{request}/boss','RequestController@bossapprove')->name('boss.approve');

    Route::get('request/{request}/spt/form','RequestController@sptview')->name('spt.view');
    Route::put('request/{request}/spt','RequestController@sptapprove')->name('spt.approve');

    Route::get('request/{request}/mgr/form','RequestController@mgrview')->name('mgr.view');
    Route::put('request/{request}/mgr','RequestController@mgrapprove')->name('mgr.approve');

    Route::get('', 'RequestController@index')->name('home');

});

