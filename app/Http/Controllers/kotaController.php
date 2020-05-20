<?php

namespace App\Http\Controllers;

use App\Kota;
use Illuminate\Http\Request;

class kotaController extends Controller
{
    public function index()
    {
        $data = Kota::orderBy('id', 'desc')->get();
        return view('admin.kota.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new kota;
        $data->nama_kota = $request->nama_kota;
        $data->zona = $request->zona;

        $data->save();

        return redirect()->route('kotaIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = kota::where('uuid', $uuid)->first();
        return view('admin.kota.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = kota::where('uuid', $uuid)->first();
        $data->nama_kota = $request->nama_kota;
        $data->zona = $request->zona;

        $data->update();

        return redirect()->route('kotaIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = kota::where('uuid', $uuid)->first()->delete();
        return redirect()->route('kotaIndex')->with('success', 'Data berhasil dihapus');
    }
}
