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
    return view('welcome');
});

Route::resource('students', 'StudentController');
//Route::resource('works', 'WorkController');
Route::get('students/{student}/works', 'WorkController@index');
Route::post('students/{student}/works', 'WorkController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

