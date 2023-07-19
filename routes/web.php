<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('login');

Route::group([], function(){
    Route::get('/posts', 'App\Http\Controllers\Post\IndexController')->name('post.index');

    Route::get('/posts/create', 'App\Http\Controllers\Post\CreateController')->name('post.create');

    Route::post('/posts', 'App\Http\Controllers\Post\StoreController')->name('post.store');

    Route::get('/posts/{post}', 'App\Http\Controllers\Post\ShowController')->name('post.show');

    Route::get('/posts/{post}/edit', 'App\Http\Controllers\Post\EditController')->name('post.edit');

    Route::patch('/posts/{post}', 'App\Http\Controllers\Post\UpdateController')->name('post.update');

    Route::delete('/posts/{post}', 'App\Http\Controllers\Post\DestroyController')->name('post.destroy');

    Route::get('/post/first_or_create', 'App\Http\Controllers\MyPlaceController@firstOrCreate');
});


Route::get('/my_city', 'App\Http\Controllers\MyCityController@city');

Route::get('/book', 'App\Http\Controllers\MyBookController@book')->name('book.index');

Route::get('/book/create', 'App\Http\Controllers\MyBookController@create')->name('book.create');

Route::post('/book', 'App\Http\Controllers\MyBookController@store')->name('book.store');

Route::get('/book/{book}', 'App\Http\Controllers\MyBookController@show')->name('book.show');

Route::get('/book/{book}/edit', 'App\Http\Controllers\MyBookController@edit')->name('book.edit');

Route::patch('/book/{book}', 'App\Http\Controllers\MyBookController@update')->name('book.update');

Route::delete('/book/{book}', 'App\Http\Controllers\MyBookController@destroy')->name('book.destroy');

Route::get('/book/delete', 'App\Http\Controllers\MyBookController@delete');

Route::get('/book/first_or_create', 'App\Http\Controllers\MyBookController@firstOrCreate');

Route::get('/book/update_or_create', 'App\Http\Controllers\MyBookController@updateOrCreate');

Route::get('/reader', 'App\Http\Controllers\ReaderController@reader');

Route::get('/order', 'App\Http\Controllers\OrderController@order');

Route::get('/my_best_friend', 'App\Http\Controllers\MyFriendController@friend');

Route::get('/main', 'App\Http\Controllers\MainController@index')->name('main.index');

Route::get('/admin/post', 'App\Http\Controllers\Admin\Post\IndexController')->middleware('admin')->name('admin.post.index');

Route::get('/contacts', 'App\Http\Controllers\ContactsController@index')->name('contacts.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
