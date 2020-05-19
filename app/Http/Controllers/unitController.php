<?php

namespace App\Http\Controllers;

use App\Unit_kerja;
use Illuminate\Http\Request;

class unitController extends Controller
{
    public function index()
    {
        $data = Unit_kerja::orderBy('id', 'desc')->get();
        return view('admin.unitKerja.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new unit_kerja;
        $data->kode_unit = $request->kode_unit;
        $data->unit = $request->unit;

        $data->save();

        return redirect()->route('unitIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = unit_kerja::where('uuid', $uuid)->first();
        return view('admin.unitKerja.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = unit_kerja::where('uuid', $uuid)->first();
        $data->kode_unit = $request->kode_unit;
        $data->unit = $request->unit;

        $data->update();

        return redirect()->route('unitIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = unit_kerja::where('uuid', $uuid)->first()->delete();
    }
}
