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
Route::post('/golongan/index/create', 'golonganController@store')->name('golonganCreate');
Route::get('/golongan/edit/{uuid}', 'golonganController@edit')->name('golonganEdit');
Route::put('/golongan/edit/{uuid}', 'golonganController@update')->name('golonganUpdate');
Route::delete('/golongan/delete/{uuid}', 'golonganController@destroy')->name('golonganDestroy');

//Jabatan Route
Route::get('/jabatan/index', 'jabatanController@index')->name('jabatanIndex');
Route::post('/jabatan/index/create', 'jabatanController@store')->name('jabatanCreate');
Route::get('/jabatan/edit/{uuid}', 'jabatanController@edit')->name('jabatanEdit');
Route::put('/jabatan/edit/{uuid}', 'jabatanController@update')->name('jabatanUpdate');
Route::delete('/jabatan/delete/{uuid}', 'jabatanController@destroy')->name('jabatanDestroy');

//Unit kerja Route
Route::get('/unit-kerja/index', 'unitController@index')->name('unitIndex');
Route::post('/unit-kerja/index/create', 'unitController@store')->name('unitCreate');
Route::get('/unit-kerja/edit/{uuid}', 'unitController@edit')->name('unitEdit');
Route::put('/unit-kerja/edit/{uuid}', 'unitController@update')->name('unitUpdate');
Route::delete('/unit-kerja/delete/{uuid}', 'unitController@destroy')->name('unitDestroy');

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
