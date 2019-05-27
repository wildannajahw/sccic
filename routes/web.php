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

Route::get('/', function () {
    $events = \App\Event::All();
    return view('welcome', ['events' => $events]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource("users", "UserController");
Route::resource("events", "EventController");
Route::resource("categories", "CategoryController");
