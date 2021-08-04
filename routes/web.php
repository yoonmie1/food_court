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

Route::get('/', 'PageController@home')->name('template.home');
Route::get('/about', 'PageController@about')->name('template.about');
Route::get('/contact', 'PageController@contact')->name('template.contact');
Route::get('/post', 'PageController@post')->name('template.post');

Route::get('/home', function () {
    return redirect()->route('template.home');
});

// CRUD
Route::middleware('auth','role:admin')->group(function(){
    Route::resource('categories', 'CategoryController'); // 7 methods
Route::resource('items', 'ItemController'); // 7 methods
Route::resource('orders', 'OrderController'); // 7 methods
});

// Authentication

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
