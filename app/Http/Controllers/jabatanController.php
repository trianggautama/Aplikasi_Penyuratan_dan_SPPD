<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;

class jabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::orderBy('id', 'desc')->get();
        return view('admin.jabatan.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new jabatan;
        $data->kode_jabatan = $request->kode_jabatan;
        $data->jabatan = $request->jabatan;

        $data->save();

        return redirect()->route('jabatanIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = jabatan::where('uuid', $uuid)->first();
        return view('admin.jabatan.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = jabatan::where('uuid', $uuid)->first();
        $data->kode_jabatan = $request->kode_jabatan;
        $data->jabatan = $request->jabatan;

        $data->update();

        return redirect()->route('jabatanIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = jabatan::where('uuid', $uuid)->first()->delete();
    }
}
