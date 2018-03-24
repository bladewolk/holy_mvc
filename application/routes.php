<?php

namespace application;

use application\Core\Route;

Route::get('/', 'HomeController@index');
Route::get('/create', 'TaskController@create');
Route::post('/store', 'TaskController@store');
Route::post('/update/{id}', 'TaskController@update');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');


Route::abort();


