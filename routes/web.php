<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/user/delete/{uuid}', 'userController@destroy')->name('userDestroy');

//Golongan Route
Route::get('/golongan/index', 'golonganController@index')->name('golonganIndex');
Route::post('/golongan/index/create', 'golonganController@store')->name('golonganCreate');
Route::get('/golongan/edit/{uuid}', 'golonganController@edit')->name('golonganEdit');
Route::put('/golongan/edit/{uuid}', 'golonganController@update')->name('golonganUpdate');
Route::get('/golongan/delete/{uuid}', 'golonganController@destroy')->name('golonganDestroy');

//Jabatan Route
Route::get('/jabatan/index', 'jabatanController@index')->name('jabatanIndex');
Route::post('/jabatan/index/create', 'jabatanController@store')->name('jabatanCreate');
Route::get('/jabatan/edit/{uuid}', 'jabatanController@edit')->name('jabatanEdit');
Route::put('/jabatan/edit/{uuid}', 'jabatanController@update')->name('jabatanUpdate');
Route::get('/jabatan/delete/{uuid}', 'jabatanController@destroy')->name('jabatanDestroy');

//Unit kerja Route
Route::get('/unit-kerja/index', 'unitController@index')->name('unitIndex');
Route::post('/unit-kerja/index/create', 'unitController@store')->name('unitCreate');
Route::get('/unit-kerja/edit/{uuid}', 'unitController@edit')->name('unitEdit');
Route::put('/unit-kerja/edit/{uuid}', 'unitController@update')->name('unitUpdate');
Route::get('/unit-kerja/delete/{uuid}', 'unitController@destroy')->name('unitDestroy');

//Kota Route
Route::get('/kota/index', 'kotaController@index')->name('kotaIndex');
Route::post('/kota/index/create', 'kotaController@store')->name('kotaCreate');
Route::get('/kota/edit/{uuid}', 'kotaController@edit')->name('kotaEdit');
Route::put('/kota/edit/{uuid}', 'kotaController@update')->name('kotaUpdate');
Route::get('/kota/delete/{uuid}', 'kotaController@destroy')->name('kotaDestroy');

//Transportasi Route
Route::get('/transportasi/index', 'transportasiController@index')->name('transportasiIndex');
Route::post('/transportasi/index/create', 'transportasiController@store')->name('transportasiCreate');
Route::get('/transportasi/edit/{uuid}', 'transportasiController@edit')->name('transportasiEdit');
Route::put('/transportasi/edit/{uuid}', 'transportasiController@update')->name('transportasiUpdate');
Route::get('/transportasi/delete/{uuid}', 'transportasiController@destroy')->name('transportasiDestroy');

//Pegawai Route
Route::get('/pegawai/index', 'pegawaiController@index')->name('pegawaiIndex');
Route::post('/pegawai/index/create', 'pegawaiController@store')->name('pegawaiCreate');
Route::get('/pegawai/edit/{uuid}', 'pegawaiController@edit')->name('pegawaiEdit');
Route::put('/pegawai/edit/{uuid}', 'pegawaiController@update')->name('pegawaiUpdate');
Route::get('/pegawai/delete/{uuid}', 'pegawaiController@destroy')->name('pegawaiDestroy');

//Agenda Route
Route::get('/agenda/index', 'agendaController@index')->name('agendaIndex');
Route::post('/agenda/index/create', 'agendaController@store')->name('agendaCreate');
Route::get('/agenda/edit/{uuid}', 'agendaController@edit')->name('agendaEdit');
Route::put('/agenda/edit/{uuid}', 'agendaController@update')->name('agendaUpdate');
Route::get('/agenda/delete/{uuid}', 'agendaController@destroy')->name('agendaDestroy');
