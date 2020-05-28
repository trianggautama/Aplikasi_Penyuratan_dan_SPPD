<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class suratMasukController extends Controller
{
    public function index()
    {
       
        return view('admin.suratMasuk.index');
    }

    public function show()
    {
       
        return view('admin.suratMasuk.show');
    }
   
    public function edit()
    {
       
        return view('admin.suratMasuk.edit');
    }

   
}
