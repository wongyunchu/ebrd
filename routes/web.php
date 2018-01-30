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
//Route::view('medicine', 'medicine.index')->name('medicine.index');
//Route::view('medicineCreate', 'medicine.create')->name('medicineCreate');

Route::get('/', function () {
    return redirect('/dashboard');
});

/*페이지*/
Route::view('chartbar', 'pages/chart_bar')->name('chartbar');
Route::view('chartpie', 'pages/chart_pie')->name('chartpie');
Route::view('chartmap', 'pages/chart_map')->name('chartmap');
Route::view('chartline', 'pages/chart_line')->name('chartline');
Route::view('chartgauge', 'pages/chart_gauge')->name('chartgauge');
Route::view('chartscatter', 'pages/chart_scatter')->name('chartscatter');
Route::view('chartradar', 'pages/chart_radar')->name('chartradar');

Route::view('profile', 'pages/profile')->name('profile');
Route::view('dashboard', 'pages/dashboard')->name('dashboard');
Route::view('test2', 'pages/test2')->name('test2');
Route::view('test_empty', 'pages/test_empty')->name('test_empty');

//근태(스케쥴러)
Route::view('work', 'pages/work')->name('work');

/*의료비*/
Route::get('medicals/details/{id?}', 'MedicalController@medicalDetails')->name('medicalDetails');
Route::post('medicals/detailsView', 'MedicalController@medicalDetailsView')->name('medicalDetailsView');
Route::resource('medicals', 'MedicalController');

/*Top bank*/
//Route::view('topbank', 'topbank/index')->name('topbank.index');
//Route::post('topbank/create', 'TopbankController@create')->name('topbank.create');

Route::get('topbank', 'TopbankController@index')->name('topbank.index');
Route::post('topbank/create', 'TopbankController@create')->name('topbank.create');
//Route::post('topbank_create', 'topbank/create')->name('topbank_create');



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


Route::get('/home', 'HomeController@index')->name('home');
