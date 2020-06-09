<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Pegawai;
use App\Rincian_sppd;
use App\Sppd;
use Illuminate\Http\Request;

class SPPDController extends Controller
{
    public function index()
    {
        $data = Sppd::orderBy('id', 'desc')->get();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return view('admin.SPPD.index', compact('data', 'kategori'));
    }

    public function store(Request $request)
    {
        $data = Sppd::create($request->all());
        return redirect()->route('SPPDIndex')->with('success', 'Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first();
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        return view('admin.SPPD.show', compact('data', 'pegawai'));
    }

    public function rincianStore(Request $request)
    {
        $data = Rincian_sppd::create($request->all());

        return redirect()->back()->with('success', 'Data berhasil disimpan');

    }

    public function rincianDestroy($uuid)
    {
        $data = Rincian_sppd::where('uuid', $uuid)->first()->delete();

        return redirect()->back();
    }

    public function edit($uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return view('admin.SPPD.edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        return redirect()->route('SPPDIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first()->delete();

        return redirect()->route('SPPDIndex');
    }
}
