<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class peminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::orderBy('id', 'desc')->get();
        $data = $peminjaman->map(function ($item) {
            $tanggal_pinjam = Carbon::parse($item->tanggal_pinjam);
            $tanggal_kembali = Carbon::parse($item->tanggal_kembali);
            $item['lama_pinjam'] = $tanggal_pinjam->diffInDays($tanggal_kembali);

            return $item;
        });
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        return view('admin.peminjaman.index', compact('data', 'pegawai'));
    }

    public function store(Request $request)
    {
        $data = Peminjaman::create($request->all());

        return redirect()->route('peminjamanIndex')->with('success', 'Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Peminjaman::where('uuid', $uuid)->first();
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();

        return view('admin.peminjaman.edit', compact('data', 'pegawai'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Peminjaman::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        $data->update();

        return redirect()->route('peminjamanIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Peminjaman::where('uuid', $uuid)->first()->delete();
        return redirect()->route('peminjamanIndex');
    }
}
