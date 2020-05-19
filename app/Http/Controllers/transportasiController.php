<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transportasiController extends Controller
{
    public function index(){
        
        return view('admin.transportasi.index');
    }

    public function edit(){
        
        return view('admin.transportasi.edit');
    }
}
