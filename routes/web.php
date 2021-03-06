<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'adminController@index')->name('index');

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
    Route::get('/suratMasuk/detail/{uuid}', 'suratMasukController@show')->name('suratMasukShow');
    Route::post('/suratMasuk/index/create', 'suratMasukController@store')->name('suratMasukCreate');
    Route::get('/suratMasuk/edit/{uuid}', 'suratMasukController@edit')->name('suratMasukEdit');
    Route::put('/suratMasuk/edit/{uuid}', 'suratMasukController@update')->name('suratMasukUpdate');
    Route::get('/suratMasuk/delete/{uuid}', 'suratMasukController@destroy')->name('suratMasukDestroy');
    Route::get('/suratMasuk/filter', 'suratMasukController@filter')->name('suratMasukFilter');

//Surat Keluar
    Route::get('/suratKeluar/index', 'suratKeluarController@index')->name('suratKeluarIndex');
    Route::get('/suratKeluar/detail', 'suratKeluarController@show')->name('suratKeluarShow');
    Route::post('/suratKeluar/index/create', 'suratKeluarController@store')->name('suratKeluarCreate');
    Route::get('/suratKeluar/detail/{uuid}', 'suratKeluarController@show')->name('suratKeluarShow');
    Route::get('/suratKeluar/edit/{uuid}', 'suratKeluarController@edit')->name('suratKeluarEdit');
    Route::put('/suratKeluar/edit/{uuid}', 'suratKeluarController@update')->name('suratKeluarUpdate');
    Route::get('/suratKeluar/delete/{uuid}', 'suratKeluarController@destroy')->name('suratKeluarDestroy');
    Route::get('/suratKeluar/filter', 'suratKeluarController@filter')->name('suratKeluarFilter');

//Surat Disposisi
    Route::get('/suratDisposisi/index', 'suratDisposisiController@index')->name('suratDisposisiIndex');
    Route::get('/suratDisposisi/detail/{uuid}', 'suratDisposisiController@show')->name('suratDisposisiShow');
    Route::post('/suratDisposisi/index/create', 'suratDisposisiController@store')->name('suratDisposisiCreate');
    Route::get('/suratDisposisi/edit/{uuid}', 'suratDisposisiController@edit')->name('suratDisposisiEdit');
    Route::put('/suratDisposisi/edit/{uuid}', 'suratDisposisiController@update')->name('suratDisposisiUpdate');
    Route::get('/suratDisposisi/delete/{uuid}', 'suratDisposisiController@destroy')->name('suratDisposisiDestroy');
    Route::get('/suratDisposisi/filter', 'suratDisposisiController@filter')->name('suratDisposisiFilter');

//Surat Permohonan
    Route::get('/suratPermohonan/index', 'suratPermohonanController@index')->name('suratPermohonanIndex');
    Route::get('/suratPermohonan/detail', 'suratPermohonanController@show')->name('suratPermohonanShow');
    Route::post('/suratPermohonan/index/create', 'suratPermohonanController@store')->name('suratPermohonanCreate');
    Route::get('/suratPermohonan/edit/{uuid}', 'suratPermohonanController@edit')->name('suratPermohonanEdit');
    Route::put('/suratPermohonan/edit/{uuid}', 'suratPermohonanController@update')->name('suratPermohonanUpdate');
    Route::get('/suratPermohonan/delete/{uuid}', 'suratPermohonanController@destroy')->name('suratPermohonanDestroy');

//Peminjaman
    Route::get('/peminjaman/index', 'peminjamanController@index')->name('peminjamanIndex');
    Route::get('/peminjaman/detail', 'peminjamanController@show')->name('peminjamanShow');
    Route::post('/peminjaman/index/create', 'peminjamanController@store')->name('peminjamanCreate');
    Route::get('/peminjaman/edit/{uuid}', 'peminjamanController@edit')->name('peminjamanEdit');
    Route::put('/peminjaman/edit/{uuid}', 'peminjamanController@update')->name('peminjamanUpdate');
    Route::get('/peminjaman/delete/{uuid}', 'peminjamanController@destroy')->name('peminjamanDestroy');
    Route::get('/peminjaman/filter', 'peminjamanController@filter')->name('peminjamanFilter');

//SK (sk)
    Route::get('/sk/index', 'skController@index')->name('skIndex');
    Route::get('/sk/detail', 'skController@show')->name('skShow');
    Route::post('/sk/index/create', 'skController@store')->name('skCreate');
    Route::get('/sk/edit/{uuid}', 'skController@edit')->name('skEdit');
    Route::put('/sk/edit/{uuid}', 'skController@update')->name('skUpdate');
    Route::get('/sk/delete/{uuid}', 'skController@destroy')->name('skDestroy');
    Route::get('/sk/filter', 'skController@filter')->name('skFilter');

//Anggaran SPPD
    Route::get('/anggaranSPPD/index', 'anggaranSPPDController@index')->name('anggaranSPPDIndex');
    Route::get('/anggaranSPPD/detail', 'anggaranSPPDController@show')->name('anggaranSPPDShow');
    Route::post('/anggaranSPPD/index/create', 'anggaranSPPDController@store')->name('anggaranSPPDCreate');
    Route::get('/anggaranSPPD/edit/{uuid}', 'anggaranSPPDController@edit')->name('anggaranSPPDEdit');
    Route::put('/anggaranSPPD/edit/{uuid}', 'anggaranSPPDController@update')->name('anggaranSPPDUpdate');
    Route::get('/anggaranSPPD/delete/{uuid}', 'anggaranSPPDController@destroy')->name('anggaranSPPDDestroy');
    Route::get('/anggaranSPPD/cetak', 'reportController@anggaranSPPD')->name('anggaranSPPD');
    Route::get('/anggaranSPPD/filter', 'anggaranSPPDController@filter')->name('anggaranSPPDFilter');

//Ketegori SPPD
    Route::get('/pejabat/index', 'pejabatController@index')->name('pejabatIndex');
    Route::get('/pejabat/detail', 'pejabatController@show')->name('pejabatShow');
    Route::post('/pejabat/index/create', 'pejabatController@store')->name('pejabatCreate');
    Route::get('/pejabat/edit/{uuid}', 'pejabatController@edit')->name('pejabatEdit');
    Route::put('/pejabat/edit/{uuid}', 'pejabatController@update')->name('pejabatUpdate');
    Route::get('/pejabat/delete/{uuid}', 'pejabatController@destroy')->name('pejabatDestroy');

//Ketegori SPPD
    Route::get('/kategoriSPPD/index', 'kategoriSPPDController@index')->name('kategoriSPPDIndex');
    Route::get('/kategoriSPPD/detail', 'kategoriSPPDController@show')->name('kategoriSPPDShow');
    Route::post('/kategoriSPPD/index/create', 'kategoriSPPDController@store')->name('kategoriSPPDCreate');
    Route::get('/kategoriSPPD/edit/{uuid}', 'kategoriSPPDController@edit')->name('kategoriSPPDEdit');
    Route::put('/kategoriSPPD/edit/{uuid}', 'kategoriSPPDController@update')->name('kategoriSPPDUpdate');
    Route::get('/kategoriSPPD/delete/{uuid}', 'kategoriSPPDController@destroy')->name('kategoriSPPDDestroy');

// SPPD
    Route::get('/SPPD/index', 'SPPDController@index')->name('SPPDIndex');
    Route::get('/SPPD/detail/{uuid}', 'SPPDController@show')->name('SPPDShow');
    Route::post('/SPPD/detail/createRincian', 'SPPDController@rincianStore')->name('rincianStore');
    Route::get('/SPPD/detail/deleteRincian/{uuid}', 'SPPDController@rincianDestroy')->name('rincianDestroy');
    Route::post('/SPPD/index/create', 'SPPDController@store')->name('SPPDCreate');
    Route::get('/SPPD/edit/{uuid}', 'SPPDController@edit')->name('SPPDEdit');
    Route::put('/SPPD/edit/{uuid}', 'SPPDController@update')->name('SPPDUpdate');
    Route::get('/SPPD/delete/{uuid}', 'SPPDController@destroy')->name('SPPDDestroy');
    Route::get('/SPPD/filter/waktu', 'SPPDController@filterWaktu')->name('SPPDFilterWaktu');
    Route::get('/SPPD/filter/tujuan', 'SPPDController@filterTujuan')->name('SPPDFilterTujuan');
    Route::get('/SPPD/anggaran', 'SPPDController@SPPDAanggaran')->name('laporanAnggaranSPPD');
    Route::get('/SPPD/anggaran/detail/{uuid}', 'SPPDController@anggaranDetail')->name('rincianAnggaran');
    Route::post('/SPPD/anggaran/detail/create', 'SPPDController@anggaranDetailCreate')->name('anggaranDetailCreate');
    Route::get('/SPPD/anggaran/edit/{uuid}', 'SPPDController@anggaranEdit')->name('rincianAnggaranEdit');
    Route::put('/SPPD/anggaran/edit/{uuid}', 'SPPDController@anggaranUpdate')->name('rincianAnggaranUpdate');
    Route::get('/SPPD/anggaran/delete/{uuid}', 'SPPDController@anggaranDestroy')->name('rincianAnggaranDestroy');

// Laporan SPPD
    Route::get('Laporan/SPPD/index', 'laporanSPPDController@index')->name('laporanSPPDIndex');
// Route::get('Laporan/SPPD/detail/{uuid}', 'laporanSPPDController@show')->name('laporanSPPDShow');
    Route::post('Laporan/SPPD/index/create', 'laporanSPPDController@store')->name('laporanSPPDCreate');
    Route::get('Laporan/SPPD/edit/{uuid}', 'laporanSPPDController@edit')->name('laporanSPPDEdit');
    Route::put('Laporan/SPPD/edit/{uuid}', 'laporanSPPDController@update')->name('laporanSPPDUpdate');
    Route::get('Laporan/SPPD/delete/{uuid}', 'laporanSPPDController@destroy')->name('laporanSPPDDestroy');

// Pembatalan SPPD
    Route::get('pembatalan/SPPD/index', 'pembatalanSPPDController@index')->name('pembatalanSPPDIndex');
// Route::get('pembatalan/SPPD/detail/{uuid}', 'pembatalanSPPDController@show')->name('pembatalanSPPDShow');
    Route::post('pembatalan/SPPD/index/create', 'pembatalanSPPDController@store')->name('pembatalanSPPDCreate');
    Route::get('pembatalan/SPPD/edit/{uuid}', 'pembatalanSPPDController@edit')->name('pembatalanSPPDEdit');
    Route::put('pembatalan/SPPD/edit/{uuid}', 'pembatalanSPPDController@update')->name('pembatalanSPPDUpdate');
    Route::get('pembatalan/SPPD/delete/{uuid}', 'pembatalanSPPDController@destroy')->name('pembatalanSPPDDestroy');

// Pembatalan SPPD
    Route::get('pembatalan/RincianSPPD/index', 'pembatalanRincianSPPDController@index')->name('pembatalanRincianSPPDIndex');
    Route::get('pembatalan/RincianSPPD/detail/{uuid}', 'pembatalanRincianSPPDController@show')->name('pembatalanRincianSPPDShow');
    Route::post('pembatalan/RincianSPPD/index/create', 'pembatalanRincianSPPDController@store')->name('pembatalanRincianSPPDCreate');
    Route::get('pembatalan/RincianSPPD/edit/{uuid}', 'pembatalanRincianSPPDController@edit')->name('pembatalanRincianSPPDEdit');
    Route::put('pembatalan/RincianSPPD/edit/{uuid}', 'pembatalanRincianSPPDController@update')->name('pembatalanRincianSPPDUpdate');
    Route::get('pembatalan/RincianSPPD/delete/{uuid}', 'pembatalanRincianSPPDController@destroy')->name('pembatalanRincianSPPDDestroy');

// Pagu SPPD
    Route::get('pagu/harian/index', 'anggaranSPPDController@paguHarian')->name('paguHarianIndex');
    Route::get('pagu/harian/edit/{uuid}', 'anggaranSPPDController@paguHarianEdit')->name('paguHarianEdit');
    Route::put('pagu/harian/edit/{uuid}', 'kategoriSPPDController@update')->name('paguHarianUpdate');
    Route::get('pagu/representasi/index', 'anggaranSPPDController@paguRepresentasi')->name('paguRepresentasiIndex');
    Route::get('pagu/representasi/edit/{uuid}', 'anggaranSPPDController@paguRepresentasiEdit')->name('paguRepresentasiEdit');
    Route::put('pagu/representasi/edit/{uuid}', 'kategoriSPPDController@update')->name('paguRepresentasiUpdate');
    Route::get('pagu/penginapan/index', 'anggaranSPPDController@paguPenginapan')->name('paguPenginapanIndex');
    Route::get('pagu/penginapan/edit/{uuid}', 'anggaranSPPDController@paguPenginapanEdit')->name('paguPenginapanEdit');
    Route::put('pagu/penginapan/edit/{uuid}', 'kategoriSPPDController@update')->name('paguPenginapanUpdate');
    Route::get('pagu/tiket/index', 'anggaranSPPDController@paguTiketPesawat')->name('paguTiketPesawatIndex');
    Route::get('pagu/tiket/edit/{uuid}', 'anggaranSPPDController@paguTiketPesawatEdit')->name('paguTiketPesawatEdit');
    Route::put('pagu/tiket/edit/{uuid}', 'kategoriSPPDController@update')->name('paguTiketPesawatUpdate');
    Route::get('pagu/taksi/index', 'anggaranSPPDController@paguTaksi')->name('paguTaksiIndex');
    Route::get('pagu/taksi/edit/{uuid}', 'anggaranSPPDController@paguTaksiEdit')->name('paguTaksiEdit');
    Route::put('pagu/taksi/edit/{uuid}', 'kategoriSPPDController@update')->name('paguTaksiUpdate');

//cetak data
    Route::post('/suratMasuk/filter', 'reportController@suratMasuk')->name('suratMasukFilterCetak');
    Route::post('/suratKeluar/filter', 'reportController@suratKeluar')->name('suratKeluarFilterCetak');
    Route::post('/suratDisposisi/filter', 'reportController@suratDisposisi')->name('suratDisposisiFilterCetak');
    Route::post('/peminjaman/filter', 'reportController@peminjaman')->name('peminjamanFilterCetak');
    Route::post('/sk/filter', 'reportController@sk')->name('skFilterCetak');
    Route::get('/notaDinas/cetak/{uuid}', 'reportController@notaDinas')->name('notaDinasCetak');
    Route::get('/suratTugas/cetak/{uuid}', 'reportController@suratTugas')->name('suratTugasCetak');
    Route::get('/sppd/cetak/{uuid}', 'reportController@sppd')->name('sppdCetak');
    Route::get('/kuitansi/cetak/{uuid}', 'reportController@kuitansi')->name('kuitansiCetak');
    Route::post('/SPPD/filter/waktu', 'reportController@SPPDFilterWaktu')->name('SPPDFilterWaktuCetak');
    Route::post('/SPPD/filter/tujuan', 'reportController@SPPDFilterTujuan')->name('SPPDFilterTujuanCetak');
    Route::get('Laporan/SPPD/cetak/{uuid}', 'reportController@laporanSPPD')->name('laporanSPPDCetak');
    Route::get('/sppd/analisis', 'reportController@analisisSPPD')->name('analisisSPPD');
    Route::get('/sppd/suratMasuk', 'reportController@analisisSuratMasuk')->name('analisisSuratMasuk');
    Route::get('/sppd/suratKeluar', 'reportController@analisisSuratKeluar')->name('analisisSuratKeluar');
    Route::post('/anggaranSPPD/filter', 'reportController@anggaranFilter')->name('anggaranSPPDfilterCetak');
    Route::post('/SPPD/filter/anggaran', 'reportController@pengeluaranSPPD')->name('pengeluaranSPPDCetak');
    Route::get('/pegawai/cetak', 'reportController@pegawai')->name('pegawaiCetak');
    Route::get('/anggaran/detail/cetak/{uuid}', 'reportController@anggaranDetail')->name('anggaranDetailCetak');
    Route::get('pembatalan/SPPD/cetak/{uuid}', 'reportController@pembatalanSPPD')->name('pembatalanSPPDCetak');
    Route::get('pembatalan/rincianSPPD/cetak/{uuid}', 'reportController@pembatalanRincianSPPD')->name('pembatalanRincianSPPDCetak');

});
