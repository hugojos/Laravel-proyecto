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
Route::get('/users/{id}', 'UserController@show');
Route::post('users/{id}','UserController@edit')->name('edit');
Route::put('/users/{id}','UserController@update');

Route::get('/articles','ArticleController@create');
Route::post('/articles','ArticleController@store')->name('add');
Route::get('/articles/{id}', 'ArticleController@index')->name('mostrarArticulo');
Route::post('/articles/{id}','CommentController@store');
Route::post('/search','ArticleController@search')->name('search'); /*BUSCADOR*/
Route::get('/post','ArticleController@show')->name('mostrar');

Route::get('/', 'HomeController@index')->name('home');
