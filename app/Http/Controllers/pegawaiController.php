<?php

namespace App\Http\Controllers;

use App\Golongan;
use App\Jabatan;
use App\Pegawai;
use App\Unit_kerja;
use Illuminate\Http\Request;

class pegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::orderBy('id', 'desc')->get();
        $golongan = Golongan::orderBy('golongan', 'Asc')->get();
        $jabatan = Jabatan::orderBy('jabatan', 'Asc')->get();
        $unit_kerja = Unit_kerja::orderBy('unit', 'Asc')->get();
        return view('admin.pegawai.index', compact('data', 'golongan', 'jabatan', 'unit_kerja'));
    }

    public function store(Request $request)
    {
        $data = new pegawai;
        $data->nama = $request->nama;
        $data->NIP = $request->NIP;
        $data->golongan_id = $request->golongan_id;
        $data->jabatan_id = $request->jabatan_id;
        $data->unit_kerja_id = $request->unit_kerja_id;
        $data->bidang = $request->bidang;

        $data->save();

        return redirect()->route('pegawaiIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = pegawai::where('uuid', $uuid)->first();
        $golongan = Golongan::orderBy('golongan', 'Asc')->get();
        $jabatan = Jabatan::orderBy('jabatan', 'Asc')->get();
        $unit_kerja = Unit_kerja::orderBy('unit', 'Asc')->get();
        return view('admin.pegawai.edit', compact('data', 'golongan', 'jabatan', 'unit_kerja'));
    }

    public function update(Request $request, $uuid)
    {
        $data = pegawai::where('uuid', $uuid)->first();
        $data->nama = $request->nama;
        $data->NIP = $request->NIP;
        $data->golongan_id = $request->golongan_id;
        $data->jabatan_id = $request->jabatan_id;
        $data->unit_kerja_id = $request->unit_kerja_id;
        $data->bidang = $request->bidang;

        $data->update();

        return redirect()->route('pegawaiIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = pegawai::where('uuid', $uuid)->first()->delete();
        return redirect()->route('pegawaiIndex')->with('success', 'Data berhasil dihapus');
    }
}
