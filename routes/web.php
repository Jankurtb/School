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

Auth::routes();
// Route::get('/', 'LoginController@index');
// Route::post('/checkLogin', 'LoginController@checkLogin');
// Route::get('/dashboard', 'LoginController@dashboard');


Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/class', 'HomeController@class');
Route::get('/teacher', 'HomeController@teacher');
Route::get('/logout', 'HomeController@logout');
Route::get('/student', 'HomeController@student');