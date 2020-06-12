<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Jenis_surat;
use App\Sk;
use Illuminate\Http\Request;

class skController extends Controller
{
    public function index()
    {
        $data = Sk::orderBy('id', 'desc')->get();
        $agenda = Agenda::orderBy('id', 'desc')->get();
        $jenis_surat = Jenis_surat::orderBy('id', 'desc')->get();
        return view('admin.sk.index', compact('data', 'jenis_surat','agenda'));
    }

    public function store(Request $request)
    {
        $data = Sk::create($request->all());

        return redirect()->route('skIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Sk::where('uuid', $uuid)->first();
        $jenis_surat = Jenis_surat::orderBy('id', 'desc')->get();

        return view('admin.sk.edit', compact('data', 'jenis_surat'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Sk::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        $data->update();

        return redirect()->route('skIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Sk::where('uuid', $uuid)->first()->delete();
        return redirect()->route('skIndex');
    }
    public function filter()
    {     
        return view('admin.sk.filter');
    }
}
