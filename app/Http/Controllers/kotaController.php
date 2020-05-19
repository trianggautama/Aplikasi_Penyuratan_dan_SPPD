<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kotaController extends Controller
{
    public function index(){
        
        return view('admin.kota.index');
    }

    public function edit(){
        
        return view('admin.kota.edit');
    }
}
