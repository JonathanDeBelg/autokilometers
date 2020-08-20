<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'KilometerController@index')
    ->name('dashboard');

Route::get('/month/{month}', 'KilometerController@overview')
    ->name('overview-past-month');

Route::get('/register-km', 'KilometerController@create')
    ->name('register-km.show');

Route::post('/register-km', 'KilometerController@store')
    ->name('register-km.add');
