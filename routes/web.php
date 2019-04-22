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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('manage')->name('admin.')->group(function(){

    Route::get('/','AdminController@admin')->name('index');
    Route::get('/login','AdminController@login')->name('login');
    Route::get('/register','AdminController@register')->name('register');
    Route::get('/tables','AdminController@admin_tables')->name('admin_tables');
    Route::resource('companies','CompanyController');
    Route::resource('employes','EmployeController');


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
