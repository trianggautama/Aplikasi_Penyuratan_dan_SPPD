<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class skController extends Controller
{
    public function index()
    {
       
        return view('admin.sk.index');
    }

    public function show()
    {
       
        return view('admin.sk.show');
    }
   
    public function edit()
    {
       
        return view('admin.sk.edit');
    }
}
