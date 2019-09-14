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
    Route::get('request/import/data/form','RequestController@import')
        ->name('request.import');
    Route::post('request/import/data/form/process','RequestController@importProcess')
        ->name('request.import.process');

    Route::group(['middleware' => ['role:boss']], function () {
        Route::get('request/{request}/boss/form','RequestController@bossview')
            ->name('boss.view');
        Route::put('request/{request}/boss','RequestController@bossapprove')
            ->name('boss.approve');
    });
    
    Route::group(['middleware' => ['role:spt mis']], function () {
        Route::get('request/{request}/spt/form','RequestController@sptview')
            ->name('spt.view');
        Route::put('request/{request}/spt','RequestController@sptapprove')
            ->name('spt.approve');
    });

    Route::group(['middleware' => ['role:mgr mis']], function () {
        Route::get('request/{request}/mgr/form','RequestController@mgrview')
            ->name('mgr.view');
        Route::put('request/{request}/mgr','RequestController@mgrapprove')
            ->name('mgr.approve');
    });

    Route::group(['middleware' => ['role:staf']], function () {
        Route::get('request/{request}/status/edit','RequestController@updateview')
            ->name('updateview.view');
        Route::put('request/{request}/status/update','RequestController@updatestatus')
            ->name('updatestatus.action');
    });

    Route::get('', 'RequestController@index')->name('home');

});

Route::group(['middleware' => 'signedurl'], function () {
    Route::get('request/{request}/boss/form/{user}','RequestController@bossview')
        ->name('boss.view.urlsigned');
    Route::get('request/{request}/spt/form/{user}','RequestController@sptview')
        ->name('spt.view.urlsigned');
    Route::get('request/{request}/mgr/form/{user}','RequestController@mgrview')
        ->name('mgr.view.urlsigned');
    Route::get('request/urlsigned/{user}','RequestController@index')
        ->name('index.urlsigned');
});