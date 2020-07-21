<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Rincian_sppd;
use App\Sppd;
use Illuminate\Http\Request;

class pembatalanRincianSPPDController extends Controller
{
    public function index()
    {
        $sppd = Sppd::latest()->get();
        return view('admin.pembatalanRincianSPPD.index',compact('sppd'));
    }

    public function show($uuid)
    {
        $sppd        = Sppd::where('uuid',$uuid)->first();
        $rincianSppd = Rincian_sppd::latest()->get();
        $pegawai     = Pegawai::latest()->get();
        return view('admin.pembatalanRincianSPPD.show',compact('sppd','rincianSppd','pegawai'));
    }

    public function edit($uuid)
    {
        $sppd        = Sppd::where('uuid',$uuid)->first();
        $rincianSppd = Rincian_sppd::latest()->get();
        $pegawai     = Pegawai::latest()->get();
        return view('admin.pembatalanRincianSPPD.edit',compact('sppd','rincianSppd','pegawai'));
    }

}
