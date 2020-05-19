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
Route::post('/user/index/create', 'userController@store')->name('userCreate');
Route::get('/user/edit/{uuid}', 'userController@edit')->name('userEdit');
Route::put('/user/edit/{uuid}', 'userController@update')->name('userUpdate');
Route::delete('/user/delete/{uuid}', 'userController@destroy')->name('userDestroy');

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

//Transportasi Route
Route::get('/transportasi/index', 'transportasiController@index')->name('transportasiIndex');
Route::get('/transportasi/edit', 'transportasiController@edit')->name('transportasiEdit');

//Pegawai Route
Route::get('/pegawai/index', 'pegawaiController@index')->name('pegawaiIndex');
Route::get('/pegawai/edit', 'pegawaiController@edit')->name('pegawaiEdit');

//Agenda Route
Route::get('/agenda/index', 'agendaController@index')->name('agendaIndex');
Route::get('/agenda/edit', 'agendaController@edit')->name('agendaEdit');
