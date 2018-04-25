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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@index')->name('user');

Route::any('/perfectInformation', 'PerfectInformationController@save')->name('perfectInformation');


Route::any('/daybook', 'DaybookController@index')->name('daybook');
Route::any('/daybook/save', 'DaybookController@save')->name('save');
Route::any('/daybook/upload/{id}', 'DaybookController@upload')->name('upload');
Route::any('/daybook/update/{id}', 'DaybookController@update')->name('update');
Route::any('/daybook/details/{id}', 'DaybookController@details')->name('details');







