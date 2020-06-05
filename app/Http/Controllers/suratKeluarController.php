<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Jenis_surat;
use App\Surat_keluar;
use File;
use Illuminate\Http\Request;

class suratKeluarController extends Controller
{
    public function index()
    {
        $data = Surat_keluar::orderBy('id', 'desc')->get();
        $agenda = Agenda::orderBy('id', 'desc')->get();
        $jenis_surat = Jenis_surat::orderBy('id', 'desc')->get();
        return view('admin.suratKeluar.index', compact('data', 'agenda', 'jenis_surat'));
    }

    public function store(Request $request)
    {
        $data = Surat_keluar::create($request->all());
        if ($request->file != null) {
            $img = $request->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $request->nomor_surat . '_' . $data->id;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('suratKeluar', $file);
            $data->file = $file;
            $data->update();
        }

        return redirect()->route('suratKeluarIndex')->with('success', 'Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Surat_keluar::where('uuid', $uuid)->first();

        return view('admin.suratKeluar.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = Surat_keluar::where('uuid', $uuid)->first();
        $agenda = Agenda::orderBy('id', 'desc')->get();
        $jenis_surat = Jenis_surat::orderBy('id', 'desc')->get();

        return view('admin.suratKeluar.edit', compact('data', 'agenda', 'jenis_surat'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Surat_keluar::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        if ($request->file != null) {
            $img = $request->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $request->nomor_surat . '_' . $data->id;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('suratKeluar', $file);
            $data->file = $file;
            $data->update();
        }

        return redirect()->route('suratKeluarIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Surat_keluar::where('uuid', $uuid)->first();
        if (File::exists(public_path('suratKeluar/' . $data->file))) {
            File::delete(public_path('suratKeluar/' . $data->file));
        }

        $data->delete();

        return redirect()->route('suratKeluarIndex');
    }
}
