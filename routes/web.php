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

Route::get('/year/{year}/month/{month}', 'KilometerController@overview')
    ->name('overview-past-month');

Route::get('/register-km', 'KilometerController@create')
    ->name('register-km.show');

Route::post('/register-km', 'KilometerController@store')
    ->name('register-km.add');

Route::post('/registration/{kilometer}', 'KilometerController@update')
    ->name('edit-km.update');

Route::get('/registration/{kilometer}', 'KilometerController@edit')
        ->name('edit-km.edit');

Route::get('/refuels', 'FuelController@index')
    ->name('refuels.overview');

Route::get('/refuels/add', 'FuelController@create')
    ->name('refuels.add');

Route::get('/refuels/{fuel}/edit', 'FuelController@show')
    ->name('refuels.edit');

Route::post('/refuels/add', 'FuelController@store')
    ->name('refuels.store');

