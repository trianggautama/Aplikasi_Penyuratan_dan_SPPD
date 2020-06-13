<?php

namespace App\Http\Controllers;

use App\Anggaran;
use Illuminate\Http\Request;

class anggaranSPPDController extends Controller
{
    public function index()
    {
        $data = Anggaran::orderBy('id', 'desc')->get();
        return view('admin.anggaranSPPD.index', compact('data'));
    }

    public function store(Request $req)
    {
        $data = Anggaran::create($req->all());

        return redirect()->back()->withSuccess('Data Berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Anggaran::where('uuid', $uuid)->first();
        return view('admin.anggaranSPPD.edit', compact('data'));

    }

    public function update(Request $req, $uuid)
    {
        $data = Anggaran::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();

        return redirect()->route('anggaranSPPDIndex')->withSuccess('Data Berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Anggaran::where('uuid', $uuid)->first()->delete();

        return redirect()->back()->withSuccess('Data Berhasil dihapus');
    }

    public function filter()
    {
        return view('admin.anggaranSPPD.filter');
    }

}
