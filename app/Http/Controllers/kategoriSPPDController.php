<?php

namespace App\Http\Controllers;

use App\Golongan;
use App\Kategori;
use Illuminate\Http\Request;

class kategoriSPPDController extends Controller
{
    public function index()
    {
        $data = Kategori::where('')->orderBy('id', 'desc')->get();
        $golongan = Golongan::latest()->get();
        return view('admin.kategoriSPPD.index', compact('data', 'golongan'));
    }

    public function store(Request $request)
    {
        $data = Kategori::create($request->all());
        return back()->withSuccess('Data berhasil disimpan');

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

        if ($data->kategori == 'Pagu Harian') {

            return redirect()->route('paguHarianIndex')->with('success', 'Data berhasil disimpan');

        } elseif ($data->kategori == 'Pagu Representasi') {

            return redirect()->route('paguRepresentasiIndex')->with('success', 'Data berhasil disimpan');

        } elseif ($data->kategori == 'Pagu Penginapan') {

            return redirect()->route('paguPenginapanIndex')->with('success', 'Data berhasil disimpan');

        } elseif ($data->kategori == 'Pagu Tiket Pesawat') {

            return redirect()->route('paguTiketPesawatIndex')->with('success', 'Data berhasil disimpan');

        } else {

            return redirect()->route('paguTaksiIndex')->with('success', 'Data berhasil disimpan');

        }
    }

    public function destroy($uuid)
    {
        $data = Kategori::where('uuid', $uuid)->first()->delete();

        return redirect()->route('kategoriSPPDIndex')->with('success', 'Data berhasil dihapus');
    }
}
