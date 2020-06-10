<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class laporanSPPDController extends Controller
{
    public function index()
    {
        
        return view('admin.laporanSPPD.index');
    }


    public function edit()
    {
        return view('admin.laporanSPPD.edit');
    }

}
