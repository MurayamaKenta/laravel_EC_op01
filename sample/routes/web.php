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

//認証が必要
Route::middleware('auth')->groupe(function () {
    Route::prefix('product')->name('product.')->groupe(function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create.index');
        Route::post('/create', 'ProductController@store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
        Route::post('/edit/{id}', 'ProductController@update')->name('');
        Route::get('/show/{id}', 'ProductController@show')->name('show');
    });
});
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
