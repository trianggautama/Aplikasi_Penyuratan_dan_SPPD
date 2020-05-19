<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class unitController extends Controller
{
    public function index(){

        return view('admin.unitKerja.index');
    }

    public function edit(){
        
        return view('admin.unitKerja.edit');
    }
}
