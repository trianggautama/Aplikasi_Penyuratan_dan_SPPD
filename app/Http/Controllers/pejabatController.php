<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Pejabat;
use Illuminate\Http\Request;

class pejabatController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::latest()->get();
        $data = Pejabat::latest()->get();
        return view('admin.pejabat.index', compact('pegawai', 'data'));
    }

    public function store(Request $request)
    {
        $data = Pejabat::create($request->all());

        return redirect()->route('pejabatIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $pegawai = Pegawai::latest()->get();

        $data = Pejabat::where('uuid', $uuid)->first();
        return view('admin.pejabat.edit', compact('data', 'pegawai'));

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
