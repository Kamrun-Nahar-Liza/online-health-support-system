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
    return view('homepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/doctor', 'HomeController@doctorindex')->name('doctor');
Route::get('/patient', 'HomeController@patientindex')->name('patient');
Route::get('/admin', 'HomeController@adminindex')->name('admin');

//category
Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/categories/add', 'CategoryController@create')->name('categories.create');
Route::post('/categories', 'CategoryController@store')->name('categories.store');
Route::get('/categories/{id}', 'CategoryController@show')->name('categories.show');
Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
Route::put('/categories/{id}', 'CategoryController@update')->name('categories.update');
Route::delete('/categories/{id}', 'CategoryController@delete')->name('categories.delete');
