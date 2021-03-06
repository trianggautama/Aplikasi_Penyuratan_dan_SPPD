<?php

namespace App\Http\Controllers;

use App\Transportasi;
use Illuminate\Http\Request;

class transportasiController extends Controller
{
    public function index()
    {
        $data = Transportasi::orderBy('id', 'desc')->get();
        return view('admin.transportasi.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = Transportasi::create($request->all());

        return redirect()->route('transportasiIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = transportasi::where('uuid', $uuid)->first();
        return view('admin.transportasi.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = transportasi::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        $data->update();

        return redirect()->route('transportasiIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = transportasi::where('uuid', $uuid)->first()->delete();
        return redirect()->route('transportasiIndex');
    }
}
