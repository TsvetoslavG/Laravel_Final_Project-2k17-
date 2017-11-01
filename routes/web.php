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
    return view('index');
});

Route::resource('test' , 'TestController');

Route::get('test/create', 'TestController@create')->name('add_new_test');

Route::get('test/{$id}/edit', 'TestController@edit')->name('edit_test');

Route::get('test/{id}/delete', 'TestController@destroy')->name('delete_test');

Route::get('test', 'TestController@index')->name('get_all_test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
