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

Route::get('/', [
    'as' => 'home',
    'uses' => '\App\Http\Controllers\HomeController@index'
]);

Route::post('/upload', [
    'as' => 'upload',
    'uses' => '\App\Http\Controllers\HomeController@uploadXml'
]);

Route::get('/persons', [
    'as' => 'persons',
    'uses' => '\App\Http\Controllers\HomeController@showPersons'
]);

Route::get('/logs', [
    'as' => 'logs',
    'uses' => '\App\Http\Controllers\HomeController@showLogs'
]);
