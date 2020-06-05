<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SPPDController extends Controller
{
    public function index()
    {
       
        return view('admin.SPPD.index');
    }

    public function store(Request $request)
    {

        return redirect()->route('SPPDIndex')->with('success', 'Data berhasil disimpan');
    }

    public function show()
    {
       
        return view('admin.SPPD.show');
    }

    public function edit()
    {
       
        return view('admin.SPPD.edit');
    }

    public function update(Request $request, $uuid)
    {

        return redirect()->route('SPPDIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
       
        return redirect()->route('SPPDIndex');
    }
}
