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
Route::view('medicine', 'medicine.index');
Route::view('medicineCreate', 'medicine.create')->name('medicineCreate');


Route::get('/', 'PagesController@index');
Route::get('test', 'PagesController@test');
Route::get('about', 'PagesController@getAbout');

//pages
//Route::get('blog/{slug}', ['as'=>'blog.single', 'uses'=>'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

// posts
Route::resource('posts', 'PostsController');

// Categories
Route::resource('categories', 'CategoryController', ['except'=>['create']]); // except->only

// Tags
Route::resource('tags', 'TagController', ['except'=>['create']]); // except->only

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('dropzone', 'FileController@dropzone');
Route::post('dropzone/store', ['as'=>'dropzone.store','uses'=>'FileController@dropzoneStore']);
Route::post('dropzone/remove', ['as'=>'dropzone.remove','uses'=>'FileController@dropzoneRemove']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
