<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class golonganController extends Controller
{
    public function index(){
        
        return view('admin.golongan.index');
    }

    public function edit(){
        
        return view('admin.golongan.edit');
    }
}
