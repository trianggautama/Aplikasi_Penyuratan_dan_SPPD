<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class suratPermohonanController extends Controller
{
    public function index()
    {
       
        return view('admin.suratPermohonan.index');
    }

    public function show()
    {
       
        return view('admin.suratPermohonan.show');
    }
   
    public function edit()
    {
       
        return view('admin.suratPermohonan.edit');
    }
}
