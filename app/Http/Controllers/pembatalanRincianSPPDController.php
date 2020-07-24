<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Pembatalan_rincian_sppd;
use App\Rincian_sppd;
use App\Sppd;
use Illuminate\Http\Request;

class pembatalanRincianSPPDController extends Controller
{
    public function index()
    {
        $sppd = Sppd::where('status', 1)->latest()->get();
        return view('admin.pembatalanRincianSPPD.index', compact('sppd'));
    }

    public function show($uuid)
    {
        $sppd = Sppd::where('uuid', $uuid)->first();
        $rincianSppd = Rincian_sppd::where('sppd_id', $sppd->id)->latest()->get();
        $pegawai = Pegawai::latest()->get();
        return view('admin.pembatalanRincianSPPD.show', compact('sppd', 'rincianSppd', 'pegawai'));
    }

    public function store(Request $req)
    {
        $data = Pembatalan_rincian_sppd::create($req->all());
        $rincianSppd = Rincian_sppd::findOrFail($req->rincian_sppd_id);
        $rincianSppd->total_anggaran = 0;
        $rincianSppd->status = 0;
        $rincianSppd->update();

        return back()->withSuccess('Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Pembatalan_rincian_sppd::where('uuid', $uuid)->first();
        $rincianSppd = Rincian_sppd::latest()->get();
        $pegawai = Pegawai::latest()->get();
        return view('admin.pembatalanRincianSPPD.edit', compact('data', 'rincianSppd', 'pegawai'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Pembatalan_rincian_sppd::where('uuid', $uuid)->first();

        $data->fill($req->all())->save();
        $data->update();

        return redirect()->route('pembatalanRincianSPPDShow', ['uuid' => $data->sppd->uuid])->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Pembatalan_rincian_sppd::where('uuid', $uuid)->first()->delete();

        return back()->withSuccess('Data berhasil dihapus');
    }

}
