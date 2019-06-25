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

Route::get('/parser', 'LoaderController@index');
Route::resource('/{paginCount?}','VacanciesController',['only' => 'index']);
Route::resource('/vacancy', 'VacanciesController', ['only' => 'show']);
Route::resource('/company','CompaniesController', ['only' => 'show']);
Route::get('/404', 'ErrorController@notfound');
Route::get('/500',  'ErrorController@fatal');



