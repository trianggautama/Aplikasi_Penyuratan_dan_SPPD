<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Pembatalan_sppd;
use App\Sppd;
use Illuminate\Http\Request;

class pembatalanSPPDController extends Controller
{
    public function index()
    {
        $sppd = Sppd::latest()->get();
        $pegawai = Pegawai::latest()->get();
        $data = Pembatalan_sppd::whereHas('sppd', function ($d) {
            $d->where('status', 0);
        })->get();
        return view('admin.pembatalanSPPD.index', compact('sppd', 'pegawai', 'data'));
    }

    public function store(Request $req)
    {
        $data = Pembatalan_sppd::create($req->all());
        $sppd = Sppd::findOrFail($req->sppd_id);
        $sppd->status = 0;
        $sppd->update();

        return back()->withSuccess('Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Pembatalan_sppd::where('uuid', $uuid)->first();

        $sppd = Sppd::latest()->get();
        $pegawai = Pegawai::latest()->get();
        return view('admin.pembatalanSPPD.edit', compact('sppd', 'pegawai', 'data'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Pembatalan_sppd::where('uuid', $uuid)->first();

        $data->fill($req->all())->save();

        return redirect()->route('pembatalanSPPDIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Pembatalan_sppd::where('uuid', $uuid)->first()->delete();

        return back()->withSuccess('Data berhasil dihapus');
    }
}
