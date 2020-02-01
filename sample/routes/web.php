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

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', 'ProductController@index')->middleware('auth')
    ->name('product.index');
Route::get('/product/create', 'ProductController@create')->middleware('auth')
    ->name('create.index');
Route::post('/product/create', 'ProductController@store')->middleware('auth');
Route::get('/product/edit/{id}', 'ProductController@edit')
    ->name('product.edit');
Route::post('/product/edit/{id}', 'ProductController@update');
Route::get('/product/show/{id}', 'ProductController@show')->name('product.show');

Route::get('user/{id}', 'UsersController@edit')->name('user');
Route::post('user/{id}', 'UsersController@update');
// GET	/photos	index	photos.index
// GET	/photos/create	create	photos.create
// POST	/photos	store	photos.store
// GET	/photos/{photo}	show	photos.show
// GET	/photos/{photo}/edit	edit	photos.edit
// PUT/PATCH	/photos/{photo}	update	photos.update
// DELETE	/photos/{photo}	destroy	photos.destroy
Route::get('test', 'SerchController@index')->name('search.index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
