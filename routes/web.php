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

//Surat Masuk
Route::get('/suratMasuk/index', 'suratMasukController@index')->name('suratMasukIndex');
Route::get('/suratMasuk/detail', 'suratMasukController@show')->name('suratMasukShow');
Route::post('/suratMasuk/index/create', 'suratMasukController@store')->name('suratMasukCreate');
Route::get('/suratMasuk/edit/', 'suratMasukController@edit')->name('suratMasukEdit');
Route::put('/suratMasuk/edit/{uuid}', 'suratMasukController@update')->name('suratMasukUpdate');
Route::get('/suratMasuk/delete/{uuid}', 'suratMasukController@destroy')->name('suratMasukDestroy');

//Surat Keluar
Route::get('/suratKeluar/index', 'suratKeluarController@index')->name('suratKeluarIndex');
Route::get('/suratKeluar/detail', 'suratKeluarController@show')->name('suratKeluarShow');
Route::post('/suratKeluar/index/create', 'suratKeluarController@store')->name('suratKeluarCreate');
Route::get('/suratKeluar/edit/', 'suratKeluarController@edit')->name('suratKeluarEdit');
Route::put('/suratKeluar/edit/{uuid}', 'suratKeluarController@update')->name('suratKeluarUpdate');
Route::get('/suratKeluar/delete/{uuid}', 'suratKeluarController@destroy')->name('suratKeluarDestroy');

//Surat Disposisi
Route::get('/suratDisposisi/index', 'suratDisposisiController@index')->name('suratDisposisiIndex');
Route::get('/suratDisposisi/detail', 'suratDisposisiController@show')->name('suratDisposisiShow');
Route::post('/suratDisposisi/index/create', 'suratDisposisiController@store')->name('suratDisposisiCreate');
Route::get('/suratDisposisi/edit/', 'suratDisposisiController@edit')->name('suratDisposisiEdit');
Route::put('/suratDisposisi/edit/{uuid}', 'suratDisposisiController@update')->name('suratDisposisiUpdate');
Route::get('/suratDisposisi/delete/{uuid}', 'suratDisposisiController@destroy')->name('suratDisposisiDestroy');

//Surat Permohonan
Route::get('/suratPermohonan/index', 'suratPermohonanController@index')->name('suratPermohonanIndex');
Route::get('/suratPermohonan/detail', 'suratPermohonanController@show')->name('suratPermohonanShow');
Route::post('/suratPermohonan/index/create', 'suratPermohonanController@store')->name('suratPermohonanCreate');
Route::get('/suratPermohonan/edit/', 'suratPermohonanController@edit')->name('suratPermohonanEdit');
Route::put('/suratPermohonan/edit/{uuid}', 'suratPermohonanController@update')->name('suratPermohonanUpdate');
Route::get('/suratPermohonan/delete/{uuid}', 'suratPermohonanController@destroy')->name('suratPermohonanDestroy');

//Peminjaman
Route::get('/peminjaman/index', 'peminjamanController@index')->name('peminjamanIndex');
Route::get('/peminjaman/detail', 'peminjamanController@show')->name('peminjamanShow');
Route::post('/peminjaman/index/create', 'peminjamanController@store')->name('peminjamanCreate');
Route::get('/peminjaman/edit/', 'peminjamanController@edit')->name('peminjamanEdit');
Route::put('/peminjaman/edit/{uuid}', 'peminjamanController@update')->name('peminjamanUpdate');
Route::get('/peminjaman/delete/{uuid}', 'peminjamanController@destroy')->name('peminjamanDestroy');

//SK
Route::get('/sk/index', 'skController@index')->name('skIndex');
Route::get('/sk/detail', 'skController@show')->name('skShow');
Route::post('/sk/index/create', 'skController@store')->name('skCreate');
Route::get('/sk/edit/', 'skController@edit')->name('skEdit');
Route::put('/sk/edit/{uuid}', 'skController@update')->name('skUpdate');
Route::get('/sk/delete/{uuid}', 'skController@destroy')->name('skDestroy');