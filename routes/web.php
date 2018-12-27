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

Route::get('/student', 'StudentController@index');

Route::get('/student/{id}', 'StudentController@detail');
Route::post('/student', 'StudentController@bio');
Route::post('/talaqqi', 'StudentController@talaqqi');

Route::get('/home', 'HomeController@home');
Route::get('/', 'HomeController@home');

Route::get('/about', 'HomeController@about');

Route::get('/mission', 'HomeController@mission');

Route::get('/blog', 'HomeController@blog');

Route::get('/contact', 'HomeController@contact');