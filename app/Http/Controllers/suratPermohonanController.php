<?php

namespace App\Http\Controllers;

use App\Jenis_surat;
use Illuminate\Http\Request;

class suratPermohonanController extends Controller
{

    public function index()
    {
        $data = Jenis_surat::orderBy('id', 'desc')->get();
        return view('admin.suratPermohonan.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = Jenis_surat::create($request->all());

        return redirect()->route('suratPermohonanIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Jenis_surat::where('uuid', $uuid)->first();
        return view('admin.suratPermohonan.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Jenis_surat::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        $data->update();

        return redirect()->route('suratPermohonanIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Jenis_surat::where('uuid', $uuid)->first()->delete();
        return redirect()->route('suratPermohonanIndex');
    }
}
