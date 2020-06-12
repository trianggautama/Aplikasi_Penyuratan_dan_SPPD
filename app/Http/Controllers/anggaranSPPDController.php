<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class anggaranSPPDController extends Controller
{
    public function index()
    {
      
        return view('admin.anggaranSPPD.index');
    }


    public function edit()
    {
    
        return view('admin.anggaranSPPD.edit');

    }

    
}
