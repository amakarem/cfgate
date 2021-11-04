<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', 'App\Http\Controllers\PublicController@index')->name('homepage');

Route::get('/{slag}', 'App\Http\Controllers\PublicController@page')->name('page');
Route::get('/post/{slag}', 'App\Http\Controllers\PublicController@post')->name('post');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
