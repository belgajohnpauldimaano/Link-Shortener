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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'url-shortener'], function () {
    Route::post('url_shortener', 'HomeController@url_shortener')->name('urlshortener');
});

Route::get('/{url_code}', 'HomeController@redirect_shortened_url');