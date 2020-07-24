<?php

namespace App\Http\Controllers;

use App\Anggaran;
use App\Golongan;
use App\Kategori;
use App\Kota;
use Illuminate\Http\Request;

class anggaranSPPDController extends Controller
{
    public function index()
    {
        $data = Anggaran::orderBy('id', 'desc')->get();
        return view('admin.anggaranSPPD.index', compact('data'));
    }

    public function paguHarian()
    {
        $data = Kategori::where('kategori', 'Pagu Harian')->orderBy('id', 'desc')->get();
        $kota = Kota::latest()->get();
        return view('admin.anggaranSPPD.paguHarian ', compact('data', 'kota'));
    }

    public function paguHarianEdit($uuid)
    {
        $data = Kategori::where('uuid', $uuid)->first();
        $kota = Kota::latest()->get();
        return view('admin.anggaranSPPD.paguHarianEdit', compact('data', 'kota'));
    }

    public function paguRepresentasi()
    {
        $data = Kategori::where('kategori', 'Pagu Representasi')->orderBy('id', 'desc')->get();
        $golongan = Golongan::latest()->get();
        return view('admin.anggaranSPPD.paguRepresentasi', compact('data', 'golongan'));
    }

    public function paguRepresentasiEdit($uuid)
    {
        $data = Kategori::where('uuid', $uuid)->first();
        $golongan = Golongan::latest()->get();
        return view('admin.anggaranSPPD.paguRepresentasiEdit', compact('data', 'golongan'));
    }

    public function paguPenginapan()
    {
        $data = Kategori::where('kategori', 'Pagu Penginapan')->orderBy('id', 'desc')->get();
        $golongan = Golongan::latest()->get();
        $kota = Kota::latest()->get();
        return view('admin.anggaranSPPD.paguPenginapan', compact('data', 'golongan', 'kota'));
    }

    public function paguPenginapanEdit($uuid)
    {
        $data = Kategori::where('uuid', $uuid)->first();
        $golongan = Golongan::latest()->get();
        $kota = Kota::latest()->get();
        return view('admin.anggaranSPPD.paguPenginapanEdit', compact('data', 'golongan', 'kota'));
    }

    public function paguTiketPesawat()
    {
        $data = Kategori::where('kategori', 'Pagu Tiket Pesawat')->orderBy('id', 'desc')->get();
        $kota = Kota::latest()->get();
        return view('admin.anggaranSPPD.paguTiketPesawat', compact('data', 'kota'));
    }

    public function paguTiketPesawatEdit($uuid)
    {
        $data = Kategori::where('uuid', $uuid)->first();
        $kota = Kota::latest()->get();
        return view('admin.anggaranSPPD.paguTiketPesawatEdit', compact('data', 'kota'));
    }

    public function paguTaksi()
    {
        $data = Kategori::where('kategori', 'Pagu Taksi')->orderBy('id', 'desc')->get();
        $kota = Kota::latest()->get();
        return view('admin.anggaranSPPD.paguTaksi', compact('data', 'kota'));
    }

    public function paguTaksiEdit($uuid)
    {
        $data = Kategori::where('uuid', $uuid)->first();
        $kota = Kota::latest()->get();
        return view('admin.anggaranSPPD.paguTaksiEdit', compact('data', 'kota'));
    }

    public function store(Request $req)
    {
        $data = Anggaran::create($req->all());

        return redirect()->back()->withSuccess('Data Berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Anggaran::where('uuid', $uuid)->first();
        return view('admin.anggaranSPPD.edit', compact('data'));

    }

    public function update(Request $req, $uuid)
    {
        $data = Anggaran::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();

        return redirect()->route('anggaranSPPDIndex')->withSuccess('Data Berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Anggaran::where('uuid', $uuid)->first()->delete();

        return redirect()->back()->withSuccess('Data Berhasil dihapus');
    }

    public function filter()
    {
        return view('admin.anggaranSPPD.filter');
    }

}
