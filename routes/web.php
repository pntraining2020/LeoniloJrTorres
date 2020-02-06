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

Route::get('/', 'TimeController@retrieveAll');
Route::get('/timeIn/{id}', 'TimeController@timeIn')->name('timeIn');
Route::get('/timeOut/{id}', 'TimeController@timeOut')->name('timeOut');
Route::get('/start_break/{id}', 'TimeController@start_break')->name('start_break');
Route::get('/end_break/{id}', 'TimeController@end_break')->name('end_break');
Route::post('/switch', 'TimeController@switchEmp')->name('checkEmp');
