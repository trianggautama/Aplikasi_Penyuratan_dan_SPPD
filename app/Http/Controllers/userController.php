<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        $data = User::orderBy('id', 'desc')->get();
        return view('admin.user.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new User;
        $data->nama = $request->nama;
        $data->NIP = $request->NIP;
        $data->username = $request->username;
        $data->password = Hash::make($request->password);

        $data->save();

        return redirect()->route('userIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = User::where('uuid', $uuid)->first();
        return view('admin.user.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = User::where('uuid', $uuid)->first();
        $data->nama = $request->nama;
        $data->NIP = $request->NIP;
        if (isset($request->username)) {
            $data->username = $request->username;
        }
        if (isset($request->password)) {
            $data->password = Hash::make($request->password);
        }

        $data->update();

        return redirect()->route('userIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = User::where('uuid', $uuid)->first()->delete();
        return redirect()->route('userIndex')->with('success', 'Data berhasil dihapus');

    }
}
