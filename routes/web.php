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

//Public
Route::get('/', 'HomeController@index');
//Public->Posts
Route::get('/posts', 'PostController@index')->name('home');
Route::get('/posts/{slug}', 'PostController@show')->name('/post');
//Public->Categories
Route::get('/categories/{slug}', 'CategoryController@show')->name('cat');

//Mails
Route::get('/mails/newsletter', 'MailController@newsletter')->name('newsletter');


//Auth
Auth::routes();

//Admin
Route::get('/home', 'HomeController@index');
Route::prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index');
        Route::resource('posts', 'PostController');
        Route::get('test/vue', 'TestController@vue')->name('vue-test');
    });
