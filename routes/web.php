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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/edit', 'ProfileController@edit');
Route::patch('/profile/edit', 'ProfileController@update');

Route::get('/job', 'JobController@index');
Route::get('/job/create', 'JobController@create');
Route::post('/job', 'JobController@store');
Route::delete('/job', 'JobController@destroy');
Route::get('/job/{job}/edit', 'JobController@edit');
Route::patch('/job/{job}', 'JobController@update');


Route::get('/project', 'ProjectController@index');
Route::get('/project/create', 'ProjectController@create');
Route::get('/project/{project}/edit', 'ProjectController@edit');
Route::post('/project', 'ProjectController@store');
