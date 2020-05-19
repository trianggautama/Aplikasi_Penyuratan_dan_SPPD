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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/index', 'adminController@index')->name('index');

//User Route
Route::get('/user/index', 'userController@index')->name('userIndex');
Route::get('/user/edit', 'userController@edit')->name('userEdit');


//Golongan Route
Route::get('/golongan/index', 'golonganController@index')->name('golonganIndex');
Route::get('/golongan/edit', 'golonganController@edit')->name('golonganEdit');

//jabatan Route
Route::get('/jabatan/index', 'jabatanController@index')->name('jabatanIndex');
Route::get('/jabatan/edit', 'jabatanController@edit')->name('jabatanEdit');

//Unit Kerja Route
Route::get('/unit/index', 'unitController@index')->name('unitIndex');
Route::get('/unit/edit', 'unitController@edit')->name('unitEdit');

//Kota Route
Route::get('/kota/index', 'kotaController@index')->name('kotaIndex');
Route::get('/kota/edit', 'kotaController@edit')->name('kotaEdit');