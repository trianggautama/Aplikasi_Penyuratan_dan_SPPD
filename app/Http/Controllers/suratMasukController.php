<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Jenis_surat;
use App\Surat_masuk;
use File;
use Illuminate\Http\Request;

class suratMasukController extends Controller
{
    public function index()
    {
        $data = Surat_masuk::orderBy('id', 'desc')->get();
        $agenda = Agenda::orderBy('id', 'desc')->get();
        $jenis_surat = Jenis_surat::orderBy('id', 'desc')->get();
        return view('admin.suratMasuk.index', compact('data', 'agenda', 'jenis_surat'));
    }

    public function store(Request $request)
    {
        $data = Surat_masuk::create($request->all());
        if ($request->file != null) {
            $img = $request->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $request->nomor_surat . '_' . $data->id;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('suratMasuk', $file);
            $data->file = $file;
            $data->update();
        }

        return redirect()->route('suratMasukIndex')->with('success', 'Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Surat_masuk::where('uuid', $uuid)->first();

        return view('admin.suratMasuk.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = Surat_masuk::where('uuid', $uuid)->first();
        $agenda = Agenda::orderBy('id', 'desc')->get();
        $jenis_surat = Jenis_surat::orderBy('id', 'desc')->get();

        return view('admin.suratMasuk.edit', compact('data', 'agenda', 'jenis_surat'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Surat_masuk::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        if ($request->file != null) {
            $img = $request->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $request->nomor_surat . '_' . $data->id;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('suratMasuk', $file);
            $data->file = $file;
            $data->update();
        }

        return redirect()->route('suratMasukIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Surat_masuk::where('uuid', $uuid)->first();
        if (File::exists(public_path('suratMasuk/' . $data->file))) {
            File::delete(public_path('suratMasuk/' . $data->file));
        }

        $data->delete();

        return redirect()->route('suratMasukIndex');
    }

    public function filter()
    {     
        return view('admin.suratMasuk.filter');
    }

}
