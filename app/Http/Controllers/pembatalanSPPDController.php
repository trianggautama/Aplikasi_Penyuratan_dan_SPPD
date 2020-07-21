<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Sppd;
use Illuminate\Http\Request;

class pembatalanSPPDController extends Controller
{
    public function index()
    {
        $sppd = Sppd::latest()->get();
        $pegawai = Pegawai::latest()->get();
        return view('admin.pembatalanSPPD.index',compact('sppd','pegawai'));
    }

    public function edit($uuid)
    {
        $sppd = Sppd::latest()->get();
        $pegawai = Pegawai::latest()->get();
        return view('admin.pembatalanSPPD.edit',compact('sppd','pegawai'));
    }
}
