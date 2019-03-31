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
Route::post('/student', 'StudentController@add');

Route::get('/student/{id}', 'StudentDetailController@detail');
Route::get('/student/delete/{id}', 'StudentDetailController@delete');
Route::get('/student/excel/{id}', 'StudentDetailController@excel');

Route::post('/studentpass', 'StudentDetailController@password');
Route::post('/student_bio', 'StudentDetailController@bio');
Route::post('/talaqqi', 'StudentDetailController@talaqqi');
Route::post('/student_li', 'StudentDetailController@student_li');

Route::get('/home', 'HomeController@home');
Route::get('/', 'HomeController@home');

Route::get('/about', 'HomeController@about');

Route::get('/mission', 'HomeController@mission');

Route::get('/donate', 'HomeController@donate');

Route::get('/contact', 'HomeController@contact');

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
// Route::get('/login', 'SessionController@view');

// Route::get('/thumbnail/{folder}/{image_path}', function($folder,$image_path){
//     $img = Image::make('uploads/'.$folder.'/'.$image_path)->fit(96, 96);

// 	return $img->response();
// });

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

