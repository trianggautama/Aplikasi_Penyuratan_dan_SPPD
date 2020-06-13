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
        $suratMasuk  = Surat_masuk::all();
        $suratKeluar = Surat_keluar::all();
        $sppd        = Sppd::all();
        $disposisi   = Disposisi_surat::all();
        $pegawai     = Pegawai::all();
        $peminjaman  = Peminjaman::all();
        $sk          = Sk::all();
        return view('admin.index',compact('suratMasuk','suratKeluar','sppd','disposisi','pegawai','peminjaman','sk'));
    }
}
