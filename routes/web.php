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

    Route::group(['prefix' => 'articles'], function () {

        Route::get('/', [
            'uses' => 'ArticlesController@index',
            'as' => 'articles.index'
        ]);

        Route::get('/create', [
            'uses' => 'ArticlesController@create',
            'as' => 'articles.create'
        ]);

        Route::post('/store', [
            'uses' => 'ArticlesController@store',
            'as' => 'articles.store'
        ]);

        Route::get('/edit/{id}', [
            'uses' => 'ArticlesController@edit',
            'as' => 'articles.edit'
        ]);

        Route::post('/update/{id}', [
            'uses' => 'ArticlesController@update',
            'as' => 'articles.update'
        ]);

        Route::post('/delete/{id}', [
            'uses' => 'ArticlesController@delete',
            'as' => 'articles.delete'
        ]);
    });
});
