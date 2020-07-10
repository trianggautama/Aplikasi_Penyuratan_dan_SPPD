<?php

namespace App\Http\Controllers;

use App\Anggaran;
use App\Anggaran_detail;
use App\Kategori;
use App\Kota;
use App\Pegawai;
use App\Rincian_sppd;
use App\Sppd;
use App\Transportasi;
use Illuminate\Http\Request;

class SPPDController extends Controller
{
    public function index()
    {
        $sppd = Sppd::orderBy('id', 'desc')->get();
        $data = $sppd->map(function ($item) {
            $jumlah = $item->rincian_sppd->count();
            $total = $item->rincian_sppd->sum('total_anggaran');
            $item['jumlah_orang'] = $jumlah;
            $item['total'] = $total;

            return $item;
        });
        $kota = Kota::orderBy('id', 'desc')->get();
        $anggaran = Anggaran::orderBy('id', 'desc')->get();
        $transportasi = Transportasi::latest()->get();
        return view('admin.SPPD.index', compact('data', 'kota', 'anggaran', 'transportasi'));
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
        $besar_pagu = $sppd->besar_pagu;
        $sppd->jumlah = $jumlah * $besar_pagu;
        $sppd->update();

        return redirect()->back()->with('success', 'Data berhasil disimpan');

    }

    public function rincianDestroy($uuid)
    {
        $data = Rincian_sppd::where('uuid', $uuid)->first();
        $sppd = Sppd::findOrFail($data->sppd_id);
        $besar_pagu = $sppd->besar_pagu;
        $sppd->jumlah = $sppd->jumlah - $besar_pagu;
        $sppd->update();

        $data->delete();

        return redirect()->back();
    }

    public function edit($uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $kota = Kota::orderBy('id', 'desc')->get();
        $transportasi = Transportasi::orderBy('id', 'desc')->get();
        return view('admin.SPPD.edit', compact('data', 'kategori', 'kota', 'transportasi'));
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

    public function anggaranDetail($uuid)
    {
        $rincian = Rincian_sppd::where('uuid', $uuid)->first();
        $kategori = Kategori::where('golongan_id', $rincian->pegawai->golongan->id)->get();
        $data = Anggaran_detail::where('rincian_sppd_id', $rincian->id)->get();

        return view('admin.SPPD.anggaranDetail', compact('rincian', 'kategori', 'data'));
    }

    public function anggaranDetailCreate(Request $req)
    {
        $data = Anggaran_detail::create($req->all());
        $rincian = Rincian_sppd::findOrFail($req->rincian_sppd_id);
        $jumlah = $rincian->anggaran_detail->sum('besaran');
        $rincian->total_anggaran = $jumlah;
        $rincian->update();

        return back()->withSuccess('Data berhasil disimpan');
    }

    public function anggaranEdit($uuid)
    {
        $data = Anggaran_detail::where('uuid', $uuid)->first();
        $kategori = Kategori::where('golongan_id', $data->rincian_sppd->pegawai->golongan->id)->get();
        return view('admin.SPPD.anggaranEdit', compact('data', 'kategori'));
    }

    public function anggaranUpdate(Request $req, $uuid)
    {
        $data = Anggaran_detail::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();

        $rincian = Rincian_sppd::findOrFail($data->rincian_sppd_id);
        $jumlah = $rincian->anggaran_detail->sum('besaran');
        $rincian->total_anggaran = $jumlah;
        $rincian->update();

        return redirect()->route('rincianAnggaran', ['uuid' => $rincian->uuid])->withSuccess('Data berhasil diubah');
    }

    public function anggaranDestroy(Request $req, $uuid)
    {
        $data = Anggaran_detail::where('uuid', $uuid)->first();

        $rincian = Rincian_sppd::findOrFail($data->rincian_sppd_id);

        $besar_pagu = $rincian->besaran;
        $rincian->total_anggaran = $sppd->total_anggaran - $besar_pagu;

        $data->delete();

        return redirect()->route('rincianAnggaran', ['uuid' => $rincian->uuid])->withSuccess('Data berhasil diubah');
    }

}
