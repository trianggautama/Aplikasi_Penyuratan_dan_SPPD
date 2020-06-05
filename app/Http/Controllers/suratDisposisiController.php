<?php

namespace App\Http\Controllers;

use App\Disposisi_surat;
use App\Pegawai;
use App\Surat_masuk;
use Illuminate\Http\Request;

class suratDisposisiController extends Controller
{
    public function index()
    {
        $data = Disposisi_surat::orderBy('id', 'desc')->get();
        $surat_masuk = Surat_masuk::orderBy('id', 'desc')->get();
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        return view('admin.suratDisposisi.index', compact('data', 'surat_masuk', 'pegawai'));
    }

    public function store(Request $request)
    {
        $data = Disposisi_surat::create($request->all());

        return redirect()->route('suratDisposisiIndex')->with('success', 'Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Disposisi_surat::where('uuid', $uuid)->first();
        return view('admin.suratDisposisi.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = Disposisi_surat::where('uuid', $uuid)->first();
        $surat_masuk = Surat_masuk::orderBy('id', 'desc')->get();
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        return view('admin.suratDisposisi.edit', compact('data', 'surat_masuk', 'pegawai'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Disposisi_surat::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        $data->update();

        return redirect()->route('suratDisposisiIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Disposisi_surat::where('uuid', $uuid)->first()->delete();
        return redirect()->route('suratDisposisiIndex');
    }
}
