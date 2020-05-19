<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jabatanController extends Controller
{
    public function index(){
        
        return view('admin.jabatan.index');
    }

    public function edit(){
        
        return view('admin.jabatan.edit');
    }
}
