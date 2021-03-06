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

Route::get('/', 'PageController@index');
Route::get('/cv', 'PageController@cv');

Auth::routes(['register' => false]);

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
Route::patch('/project/{project}', 'ProjectController@update');
Route::patch('/project/{project}/disconnect', 'ProjectController@disconnect');
Route::post('/project', 'ProjectController@store');
Route::delete('/project', 'ProjectController@destroy');

Route::get('/language/create', 'LanguageController@create');
Route::post('/language', 'LanguageController@store');
Route::post('/language/{language}/assign', 'LanguageController@assign');
Route::patch('/language/{language}/unassign', 'LanguageController@unassign');


Route::get('/interest', 'InterestController@index');
Route::get('/interest/create', 'InterestController@create');
Route::post('/interest', 'InterestController@store');
Route::get('/interest/{interest}/edit', 'InterestController@edit');
Route::patch('/interest/{interest}', 'InterestController@update');
Route::delete('/interest/{interest}', 'InterestController@destroy');
