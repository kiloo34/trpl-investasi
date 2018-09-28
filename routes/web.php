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

Route::get('/', 'UserController@index')->name('home');
Route::get('/beranda', 'HomeController@index');

Route::get('/investor/profil', 'InvestorController@index')->name('investor.index');
Route::post('/investor/store', 'InvestorController@store')->name('investor.store');
Route::put('/peternak/{id}/edit', 'PeternakController@update')->name('investor.update');

Route::get('/peternak/profil', 'PeternakController@index')->name('peternak.index');
Route::post('/peternak/store', 'PeternakController@store')->name('peternak.store');
Route::put('/peternak/{id}/edit', 'PeternakController@update')->name('peternak.update');
