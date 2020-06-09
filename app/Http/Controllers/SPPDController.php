<?php

namespace App\Http\Controllers;

use App\Kategori;
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

    public function show()
    {

        return view('admin.SPPD.show');
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
