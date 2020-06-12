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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/customer','CustomerController@index')->name('customer.index');
Route::get('/customer/create','CustomerController@create')->name('customer.create');
Route::get('/customer/show/{id}','CustomerController@show')->name('customer.show');

Route::get('/customer/{id}/edit','CustomerController@edit')->name('customer.edit');



Auth::routes([
    'register' => false
]);

Route::get('/home', 'HomeController@index')->name('home');