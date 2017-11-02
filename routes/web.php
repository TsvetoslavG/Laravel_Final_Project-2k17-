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

<<<<<<< HEAD
//Show Specs
Route::get('/specs', 'SpecController@index')->name('all_specs');
Route::get('/specs/{id}/show', 'SpecController@show')->name('show_spec');
//Edit Spec
Route::get('/specs/{id}/edit', 'SpecController@edit')->name('edit_spec');
Route::post('/specs/{id}/edit', 'SpecController@update')->name('edit_spec_action');
//Create Spec
Route::get('/specs/create', 'SpecController@create')->name('create_spec');
Route::post('/specs/create', 'SpecController@store')->name('create_spec_action');
//Delete Spec
Route::get('/specs/{id}/delete', 'SpecController@destroy')->name('delete_spec');

//Show Tests
Route::get('/tests', 'TestController@index')->name('all_tests');
Route::get('/tests/{id}/show', 'TestController@show')->name('show_test');
//Edit Test
Route::get('/tests/{id}/edit', 'TestController@edit')->name('edit_test');
Route::post('/tests/{id}/edit', 'TestController@update')->name('edit_test_action');
//Create Test
Route::get('/tests/create', 'TestController@create')->name('create_test');
Route::post('/tests/create', 'TestController@store')->name('create_test_action');
//Delete Test
Route::get('/tests/{id}/delete', 'TestController@destroy')->name('delete_test');

//User Actions Controller
Route::get('/user/{id}/specs', 'UserActions@specs')->name('all_specs_user');
Route::get('/user/{id}/tests', 'UserActions@tests')->name('all_tests_user');

Route::get('/user/{user_id}/enroll_spec/{spec_id}', 'UserActions@get_spec')->name('get_spec');
Route::get('/user/{user_id}/disenroll_spec/{spec_id}', 'UserActions@remove_spec')->name('remove_spec');

Route::get('/user/{user_id}/test/{test_id}', 'UserActions@test')->name('show_test');
=======
Route::resource('test' , 'TestController');

Route::get('test/create', 'TestController@create')->name('add_new_test');

Route::get('test/{$id}/edit', 'TestController@edit')->name('edit_test');

Route::get('test/{id}/delete', 'TestController@destroy')->name('delete_test');

Route::get('test', 'TestController@index')->name('get_all_test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> origin/master
