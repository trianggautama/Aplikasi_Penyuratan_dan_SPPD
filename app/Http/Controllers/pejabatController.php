<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;

class pejabatController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::latest()->get();
        return view('admin.pejabat.index',compact('pegawai'));
    }

    public function store(Request $request)
    {
        $data = Kategori::create($request->all());

        return redirect()->route('kategoriSPPDIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Kategori::where('uuid', $uuid)->first();
        $kota = Kota::orderBy('nama_kota', 'asc')->get();
        $transportasi = Transportasi::orderBy('id', 'desc')->get();
        return view('admin.kategoriSPPD.edit', compact('data', 'kota', 'transportasi'));

    }

    public function update(Request $request, $uuid)
    {
        $data = Kategori::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        return redirect()->route('kategoriSPPDIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Kategori::where('uuid', $uuid)->first()->delete();

        return redirect()->route('kategoriSPPDIndex')->with('success', 'Data berhasil dihapus');
    }
}
