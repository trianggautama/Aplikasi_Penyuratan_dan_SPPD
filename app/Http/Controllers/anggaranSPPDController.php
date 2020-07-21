<?php

namespace App\Http\Controllers;

use App\Anggaran;
use App\Golongan;
use App\Kategori;
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
        $data = Kategori::orderBy('id', 'desc')->get();
        $golongan = Golongan::latest()->get();
        return view('admin.anggaranSPPD.paguHarian', compact('data','golongan'));
    }

    public function paguRepresentasi()
    {
        $data = Kategori::orderBy('id', 'desc')->get();
        $golongan = Golongan::latest()->get();
        return view('admin.anggaranSPPD.paguRepresentasi', compact('data','golongan'));
    }

    public function paguPenginapan()
    {
        $data = Kategori::orderBy('id', 'desc')->get();
        $golongan = Golongan::latest()->get();
        return view('admin.anggaranSPPD.paguPenginapan', compact('data','golongan'));
    }

    public function paguTiketPesawat()
    {
        $data = Kategori::orderBy('id', 'desc')->get();
        $golongan = Golongan::latest()->get();
        return view('admin.anggaranSPPD.paguTiketPesawat', compact('data','golongan'));
    }

    public function paguTaksi()
    {
        $data = Kategori::orderBy('id', 'desc')->get();
        return view('admin.anggaranSPPD.paguTaksi', compact('data'));
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
