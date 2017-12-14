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
Route::get('/users/{id}', 'UserController@show');/*Muestra el perfil del usuario*/
Route::post('/users/{id}','UserController@edit')->name('edit');/*Redirije a la vista para editar*/
Route::put('/users/{id}','UserController@update');/*Guarda los cambios*/

Route::post('/articles/{id}','CommentController@store');/*Guarda los comentarios*/

Route::get('/articles/{id}', 'ArticleController@index')->name('mostrarArticulo');/*Muestra la vista del articulo*/
Route::get('/articles','ArticleController@create');/*Muestra el formulario para agregar articulos*/

Route::get('/searchGet/{buscador}','ArticleController@searchGet'); /*BUSCADOR*/
Route::post('/search','ArticleController@search')->name('search');

Route::post('/articles','ArticleController@store')->name('add');/*Guarda el articulo*/
Route::get('/post','ArticleController@show')->name('mostrar');/*Muestra los articulos publicados del usuario*/
Route::delete('/delete','ArticleController@destroy')->name('deleteArticle');/*Elimna el articulo*/
Route::post('/articles/edit/{id}','ArticleController@edit');/*Muestra la vista para editar el aritculo*/
Route::put('/articles/update','ArticleController@update')->name('editArticle');/*Guarda los cambios del articulo*/

Route::post('/carrito/agregar', 'ShoppingController@addToCart')->name('addToCart');
Route::get('/carrito/eliminar/{id}', 'ShoppingController@deleteFromCart')->name('deleteFromCart');
Route::get('/carrito/checkout', 'ShoppingController@checkout')->name('checkout');
Route::get('/carrito', 'ShoppingController@cart')->name('cart');




Route::get('/categorias', 'ArtCategoriesController@categories');/**/
Route::get('/categorias/mujeres', 'ArtCategoriesController@womenCategory')->name('women');
Route::get('/categorias/hombres', 'ArtCategoriesController@menCategory')->name('men');
Route::get('/categorias/kids', 'ArtCategoriesController@kidsCategory')->name('kids');



Route::post('/addFav','ArticleController@addFav');
Route::post('/deleteFav','ArticleController@deleteFav');
Route::get('/misfavoritos','ArticleController@fav');


Route::get('/', 'HomeController@index')->name('home');/*INDEX*/



Route::get('/faqs', 'PagesController@faqs');/**/
Route::get('/productos', 'PagesController@products');/**/
Route::get('/soporte', 'PagesController@soporte');/**/
Route::get('/nosotros', 'PagesController@nosotros');/**/

//facebook socialite


Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
