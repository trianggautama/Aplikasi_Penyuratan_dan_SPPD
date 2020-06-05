<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kategoriSPPDController extends Controller
{
    public function index()
    {
       
        return view('admin.kategoriSPPD.index');
    }

    public function store(Request $request)
    {

        return redirect()->route('kategoriSPPDIndex')->with('success', 'Data berhasil disimpan');
    }


    public function edit()
    {
       
        return view('admin.kategoriSPPD.edit');
    }

    public function update(Request $request, $uuid)
    {

        return redirect()->route('kategoriSPPDIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
       
        return redirect()->route('kategoriSPPDIndex');
    }
}
