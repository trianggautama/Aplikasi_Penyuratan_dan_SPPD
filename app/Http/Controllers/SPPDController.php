<?php

namespace App\Http\Controllers;

use App\Anggaran;
use App\Kategori;
use App\Kota;
use App\Pegawai;
use App\Rincian_sppd;
use App\Sppd;
use Illuminate\Http\Request;

class SPPDController extends Controller
{
    public function index()
    {
        $sppd = Sppd::orderBy('id', 'desc')->get();
        $data = $sppd->map(function ($item) {
            $jumlah = $item->rincian_sppd->count();
            $item['jumlah_orang'] = $jumlah;

            return $item;
        });
        $kota = Kota::orderBy('id', 'desc')->get();
        $anggaran = Anggaran::orderBy('id', 'desc')->get();
        return view('admin.SPPD.index', compact('data', 'kota', 'anggaran'));
    }

    public function store(Request $request)
    {
        $data = Sppd::create($request->all());
        return redirect()->route('SPPDIndex')->with('success', 'Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first();
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        return view('admin.SPPD.show', compact('data', 'pegawai'));
    }

    public function rincianStore(Request $request)
    {
        $data = Rincian_sppd::create($request->all());
        $sppd = Sppd::findOrFail($request->sppd_id);
        $jumlah = $sppd->rincian_sppd->count();
        $besar_pagu = $sppd->kategori->besar_pagu;
        $sppd->jumlah = $jumlah * $besar_pagu;
        $sppd->update();

        return redirect()->back()->with('success', 'Data berhasil disimpan');

    }

    public function rincianDestroy($uuid)
    {
        $data = Rincian_sppd::where('uuid', $uuid)->first();
        $sppd = Sppd::findOrFail($data->sppd_id);
        $besar_pagu = $sppd->kategori->besar_pagu;
        $sppd->jumlah = $sppd->jumlah - $besar_pagu;
        $sppd->update();

        $data->delete();

        return redirect()->back();
    }

    public function edit($uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $anggaran = Anggaran::orderBy('id', 'desc')->get();
        return view('admin.SPPD.edit', compact('data', 'kategori', 'anggaran'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        return redirect()->route('SPPDIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first()->delete();

        return redirect()->route('SPPDIndex');
    }

    public function filterWaktu()
    {

        return view('admin.SPPD.filterWaktu');
    }

    public function filterTujuan()
    {
        $data = Kategori::all();
        return view('admin.SPPD.filterTujuan', compact('data'));
    }

    public function SPPDAanggaran()
    {

        return view('admin.SPPD.filterAnggaran');
    }

    public function anggaranDetail()
    {
        
        return view('admin.SPPD.anggaranDetail');
    }

    public function anggaranEdit()
    {
        
        return view('admin.SPPD.anggaranEdit');
    }
}
