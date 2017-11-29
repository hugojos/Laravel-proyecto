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

Auth::routes();
Route::get('/users/{id}', 'UserController@show');
Route::post('users/{id}','UserController@edit')->name('edit');
Route::put('/users/{id}','UserController@update');

Route::get('/articles','ArticleController@create');
Route::post('/articles','ArticleController@store')->name('add');
Route::get('/articles/{id}', 'ArticleController@index');

Route::get('/post','ArticleController@show')->name('mostrar');
Route::get('/home', 'HomeController@index')->name('home');
