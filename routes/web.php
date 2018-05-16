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

Route::get('/', 'HomeController@index')->name('home');
Route::post('/photo/store/{siteId}', 'PhotoController@addSiteImage')->name('photo.store');
Route::get('/category/create', 'CategoryController@create')->name('categories.create');
Route::post('/category/store', 'CategoryController@store')->name('categories.store');
Route::resources([
	'users' => 'UserController',
	'sites' => 'SiteController'
]);
