<?php

namespace App\Http\Controllers;

use App\Golongan;
use Illuminate\Http\Request;

class golonganController extends Controller
{
    public function index()
    {
        $data = golongan::orderBy('id', 'desc')->get();
        return view('admin.golongan.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Golongan;
        $data->kode_golongan = $request->kode_golongan;
        $data->golongan = $request->golongan;

        $data->save();

        return redirect()->route('golonganIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = golongan::where('uuid', $uuid)->first();
        return view('admin.golongan.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = golongan::where('uuid', $uuid)->first();
        $data->kode_golongan = $request->kode_golongan;
        $data->golongan = $request->golongan;

        $data->update();

        return redirect()->route('golonganIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = golongan::where('uuid', $uuid)->first()->delete();
        return redirect()->route('golonganIndex')->with('success', 'Data berhasil dihapus');
    }
}
