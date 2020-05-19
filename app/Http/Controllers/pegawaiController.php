<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pegawaiController extends Controller
{
    public function index(){
        
        return view('admin.pegawai.index');
    }

    public function edit(){
        
        return view('admin.pegawai.edit');
    }
}
