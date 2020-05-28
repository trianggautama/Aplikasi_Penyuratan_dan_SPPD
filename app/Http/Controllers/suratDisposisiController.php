<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class suratDisposisiController extends Controller
{
    public function index()
    {
       
        return view('admin.suratDisposisi.index');
    }

    public function show()
    {
       
        return view('admin.suratDisposisi.show');
    }
   
    public function edit()
    {
       
        return view('admin.suratDisposisi.edit');
    }
}
