<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class suratKeluarController extends Controller
{
    public function index()
    {
       
        return view('admin.suratKeluar.index');
    }

    public function show()
    {
       
        return view('admin.suratKeluar.show');
    }
   
    public function edit()
    {
       
        return view('admin.suratKeluar.edit');
    }
}
