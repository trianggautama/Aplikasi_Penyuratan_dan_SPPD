<?php

namespace App\Http\Controllers;

use App\Disposisi_surat;
use App\Pegawai;
use App\Peminjaman;
use App\Sk;
use App\Sppd;
use App\Surat_keluar;
use App\Surat_masuk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $suratMasuk  = Surat_masuk::count();
        $suratKeluar = Surat_keluar::count();
        $sppd        = Sppd::count();
        $disposisi   = Disposisi_surat::count();
        $pegawai     = Pegawai::count();
        $peminjaman  = Peminjaman::count();
        $sk          = Sk::count();
        return view('admin.index',compact('suratMasuk','suratKeluar','sppd','disposisi','pegawai','peminjaman','sk'));
    }
}
