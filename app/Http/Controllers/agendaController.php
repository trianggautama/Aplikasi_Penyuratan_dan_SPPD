<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class agendaController extends Controller
{
    public function index(){
        
        return view('admin.noAgenda.index');
    }

    public function edit(){
        
        return view('admin.noAgenda.edit');
    }
}
