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
        'uses' => 'ArticlesController@index',
        'as' => 'profile'
    ]);

    Route::group(['prefix' => 'articles'], function () {

        Route::post('/store', [
            'uses' => 'ArticlesController@store',
            'as' => 'articles.store'
        ]);

        Route::get('/like/{id}', [
            'uses' => 'ArticlesController@like',
            'as' => 'articles.like'
        ]);

        Route::get('/dislike/{id}', [
            'uses' => 'ArticlesController@dislike',
            'as' => 'articles.dislike'
        ]);

        Route::post('/update', [
            'uses' => 'ArticlesController@update',
            'as' => 'articles.update'
        ]);

        Route::post('/delete', [
            'uses' => 'ArticlesController@delete',
            'as' => 'articles.delete'
        ]);
    });
});
