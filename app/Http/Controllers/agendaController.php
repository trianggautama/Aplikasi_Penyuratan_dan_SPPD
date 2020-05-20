<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;

class agendaController extends Controller
{
    public function index()
    {
        $data = Agenda::orderBy('id', 'desc')->get();
        return view('admin.noAgenda.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new agenda;
        $data->no_agenda = $request->no_agenda;
        $data->keterangan = $request->keterangan;

        $data->save();

        return redirect()->route('agendaIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = agenda::where('uuid', $uuid)->first();
        return view('admin.noAgenda.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = agenda::where('uuid', $uuid)->first();
        $data->no_agenda = $request->no_agenda;
        $data->keterangan = $request->keterangan;

        $data->update();

        return redirect()->route('agendaIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = agenda::where('uuid', $uuid)->first()->delete();
        return redirect()->route('agendaIndex');
    }
}
