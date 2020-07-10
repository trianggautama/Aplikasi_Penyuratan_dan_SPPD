<?php

namespace App\Http\Controllers;

use App\Golongan;
use App\Kategori;
use App\Kota;
use App\Transportasi;
use Illuminate\Http\Request;

class kategoriSPPDController extends Controller
{
    public function index()
    {
        $data = Kategori::orderBy('id', 'desc')->get();
        $golongan = Golongan::latest()->get();
        return view('admin.kategoriSPPD.index', compact('data', 'golongan'));
    }

    public function store(Request $request)
    {
        $data = Kategori::create($request->all());

        return redirect()->route('kategoriSPPDIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Kategori::where('uuid', $uuid)->first();
        $golongan = Golongan::latest()->get();
        return view('admin.kategoriSPPD.edit', compact('data', 'golongan'));

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
