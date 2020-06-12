<?php

namespace App\Http\Controllers;

use App\Laporan_sppd;
use App\Sppd;
use Illuminate\Http\Request;

class laporanSPPDController extends Controller
{
    public function index()
    {
        $data = Laporan_sppd::orderBy('id', 'desc')->get();
        $sppd = Sppd::orderBy('id', 'desc')->get();
        return view('admin.laporanSPPD.index', compact('data', 'sppd'));
    }

    public function store(Request $request)
    {
        $data = Laporan_sppd::create($request->all());
        return redirect()->route('laporanSPPDIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Laporan_sppd::where('uuid', $uuid)->first();

        $sppd = Sppd::orderBy('id', 'desc')->get();
        return view('admin.laporanSPPD.edit', compact('data', 'sppd'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Laporan_sppd::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        return redirect()->route('laporanSPPDIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Laporan_sppd::where('uuid', $uuid)->first()->delete();

        return redirect()->route('laporanSPPDIndex')->with('success', 'Data berhasil dihapus');;
    }

}
