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

Route::get('/', 'MainController@index')->name('main');

Auth::routes();

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function () {

    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::get('/profile', [
        'uses' => 'HomeController@profile',
        'as' => 'profile'
    ]);

    Route::group(['prefix' => 'article'], function () {

        Route::get('/create', [
            'uses' => 'articleController@create',
            'as' => 'article.create'
        ]);

        Route::post('/store', [
            'uses' => 'articleController@store',
            'as' => 'article.store'
        ]);

        Route::get('/edit/{id}', [
            'uses' => 'articleController@edit',
            'as' => 'article.edit'
        ]);

        Route::post('/update/{id}', [
            'uses' => 'articleController@update',
            'as' => 'article.update'
        ]);

        Route::post('/delete/{id}', [
            'uses' => 'articleController@delete',
            'as' => 'article.delete'
        ]);
    });
});
