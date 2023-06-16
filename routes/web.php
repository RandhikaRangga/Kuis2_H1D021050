<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\http\Controllers\TaskController@index');

Route::get('/create', 'App\http\Controllers\TaskController@create');

Route::post('/store', 'App\http\Controllers\TaskController@store');

Route::get('/edit/{id}', 'App\http\Controllers\TaskController@edit');

Route::put('/update/{id}', 'App\http\Controllers\TaskController@update');

Route::delete('/task/{id}', 'App\http\Controllers\TaskController@destroy');

Route::get('/complete', 'App\http\Controllers\TaskController@complete');

Route::get('/incomplete', 'App\http\Controllers\TaskController@incomplete');

Route::get('/editStatus/{id}', 'App\http\Controllers\TaskController@editStatus');

Route::put('/update/{id}/status', 'App\http\Controllers\TaskController@updateStatus');

