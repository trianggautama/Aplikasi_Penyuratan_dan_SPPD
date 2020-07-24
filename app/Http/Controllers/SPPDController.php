<?php

namespace App\Http\Controllers;

use App\Anggaran;
use App\Anggaran_detail;
use App\Kategori;
use App\Kota;
use App\Pegawai;
use App\Rincian_sppd;
use App\Sppd;
use App\Transportasi;
use Illuminate\Http\Request;

class SPPDController extends Controller
{
    public function index()
    {
        $sppd = Sppd::where('status', 1)->orderBy('id', 'desc')->get();
        $data = $sppd->map(function ($item) {
            $jumlah = $item->rincian_sppd->where('status', 1)->count();
            $total = $item->rincian_sppd->sum('total_anggaran');
            $item['jumlah_orang'] = $jumlah;
            $item['total'] = $total;

            return $item;
        });
        $kota = Kota::orderBy('id', 'desc')->get();
        $anggaran = Anggaran::orderBy('id', 'desc')->get();
        $transportasi = Transportasi::latest()->get();
        return view('admin.SPPD.index', compact('data', 'kota', 'anggaran', 'transportasi'));
    }

    public function store(Request $request)
    {
        $data = Sppd::create($request->all());
        return redirect()->route('SPPDIndex')->with('success', 'Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first();
        $rincian_sppd = Rincian_sppd::where('sppd_id', $data->id)->where('status', 1)->get();
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        return view('admin.SPPD.show', compact('data', 'pegawai', 'rincian_sppd'));
    }

    public function rincianStore(Request $request)
    {
        $data = Rincian_sppd::create($request->all());
        $sppd = Sppd::findOrFail($request->sppd_id);
        $jumlah = $sppd->rincian_sppd->where('status', 1)->count();
        $besar_pagu = $sppd->besar_pagu;
        $sppd->jumlah = $jumlah * $besar_pagu;
        $sppd->update();

        return redirect()->back()->with('success', 'Data berhasil disimpan');

    }

    public function rincianDestroy($uuid)
    {
        $data = Rincian_sppd::where('uuid', $uuid)->first();
        $sppd = Sppd::findOrFail($data->sppd_id);
        $besar_pagu = $sppd->besar_pagu;
        $sppd->jumlah = $sppd->jumlah - $besar_pagu;
        $sppd->update();

        $data->delete();

        return redirect()->back();
    }

    public function edit($uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $kota = Kota::orderBy('id', 'desc')->get();
        $transportasi = Transportasi::orderBy('id', 'desc')->get();
        return view('admin.SPPD.edit', compact('data', 'kategori', 'kota', 'transportasi'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first();
        $data->fill($request->all())->save();

        return redirect()->route('SPPDIndex')->with('success', 'Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Sppd::where('uuid', $uuid)->first()->delete();

        return redirect()->route('SPPDIndex');
    }

    public function filterWaktu()
    {

        return view('admin.SPPD.filterWaktu');
    }

    public function filterTujuan()
    {
        $data = Kategori::all();
        return view('admin.SPPD.filterTujuan', compact('data'));
    }

    public function SPPDAanggaran()
    {

        return view('admin.SPPD.filterAnggaran');
    }

    public function anggaranDetail($uuid)
    {
        $rincian = Rincian_sppd::where('uuid', $uuid)->first();
        $harian = Kategori::where('kategori', 'Pagu Harian')->get();
        $representasi = Kategori::where('kategori', 'Pagu Representasi')->where('golongan_id', $rincian->pegawai->golongan->id)->get();
        $penginapan = Kategori::where('kategori', 'Pagu Penginapan')->where('golongan_id', $rincian->pegawai->golongan->id)->get();
        $tiket = Kategori::where('kategori', 'Pagu Tiket Pesawat')->get();
        $taksi = Kategori::where('kategori', 'Pagu Taksi')->get();
        $data = Anggaran_detail::where('rincian_sppd_id', $rincian->id)->get();

        return view('admin.SPPD.anggaranDetail', compact('rincian', 'harian', 'data', 'representasi', 'penginapan', 'tiket', 'taksi'));
    }

    public function anggaranDetailCreate(Request $req)
    {
        if ($req->harian_id != '') {
            $harian = Kategori::findOrFail($req->harian_id);
            $harian = $harian->besar_pagu;
        } else {
            $harian = 0;
        }

        if ($req->representasi_id != '') {
            $representasi = Kategori::findOrFail($req->representasi_id);
            $representasi = $representasi->besar_pagu;
        } else {
            $representasi = 0;
        }

        if ($req->penginapan_id != '') {
            $penginapan = Kategori::findOrFail($req->penginapan_id);
            $penginapan = $penginapan->besar_pagu;
        } else {
            $penginapan = 0;
        }

        if ($req->tiket_id != '') {
            $tiket = Kategori::findOrFail($req->tiket_id);
            $tiket = $tiket->besar_pagu;
        } else {
            $tiket = 0;
        }

        if ($req->taksi_id != '') {
            $taksi = Kategori::findOrFail($req->taksi_id);
            $taksi = $taksi->besar_pagu;
        } else {
            $taksi = 0;
        }

        // if ($req->besaran > $kategori->besar_pagu) {
        //     return back()->withWarning('Besaran melebihi anggaran');
        // } else {
        $data = Anggaran_detail::create($req->all());

        $rincian = Rincian_sppd::findOrFail($data->rincian_sppd_id);
        $jumlah = $harian + $representasi + $penginapan + $tiket + $taksi;
        $data->total_anggaran = $jumlah;

        $rincian->total_anggaran = $rincian->total_anggaran + $jumlah;
        $data->update();
        $rincian->update();

        return back()->withSuccess('Data berhasil disimpan');
        // }
    }

    public function anggaranEdit($uuid)
    {
        $data = Anggaran_detail::where('uuid', $uuid)->first();
        $rincian = Rincian_sppd::findOrFail($data->rincian_sppd_id);
        $harian = Kategori::where('kategori', 'Pagu Harian')->get();
        $representasi = Kategori::where('kategori', 'Pagu Representasi')->where('golongan_id', $rincian->pegawai->golongan->id)->get();
        $penginapan = Kategori::where('kategori', 'Pagu Penginapan')->where('golongan_id', $rincian->pegawai->golongan->id)->get();
        $tiket = Kategori::where('kategori', 'Pagu Tiket Pesawat')->get();
        $taksi = Kategori::where('kategori', 'Pagu Taksi')->get();
        return view('admin.SPPD.anggaranEdit', compact('data', 'harian', 'data', 'representasi', 'penginapan', 'tiket', 'taksi'));
    }

    public function anggaranUpdate(Request $req, $uuid)
    {
        $data = Anggaran_detail::where('uuid', $uuid)->first();

        // if ($req->besaran > $kategori->besar_pagu) {
        //     return back()->withWarning('Besaran melebihi anggaran');
        // } else {
        $data->fill($req->all())->save();

        if ($req->harian_id != '') {
            $harian = Kategori::findOrFail($req->harian_id);
            $harian = $harian->besar_pagu;
        } else {
            $harian = 0;
        }

        if ($req->representasi_id != '') {
            $representasi = Kategori::findOrFail($req->representasi_id);
            $representasi = $representasi->besar_pagu;
        } else {
            $representasi = 0;
        }

        if ($req->penginapan_id != '') {
            $penginapan = Kategori::findOrFail($req->penginapan_id);
            $penginapan = $penginapan->besar_pagu;
        } else {
            $penginapan = 0;
        }

        if ($req->tiket_id != '') {
            $tiket = Kategori::findOrFail($req->tiket_id);
            $tiket = $tiket->besar_pagu;
        } else {
            $tiket = 0;
        }

        if ($req->taksi_id != '') {
            $taksi = Kategori::findOrFail($req->taksi_id);
            $taksi = $taksi->besar_pagu;
        } else {
            $taksi = 0;
        }

        $rincian = Rincian_sppd::findOrFail($data->rincian_sppd_id);
        $jumlah = $harian + $representasi + $penginapan + $tiket + $taksi;
        $data->total_anggaran = $jumlah;

        $rincian->total_anggaran = $rincian->total_anggaran + $jumlah;
        $data->update();

        $rincian->update();

        return redirect()->route('rincianAnggaran', ['uuid' => $rincian->uuid])->withSuccess('Data berhasil diubah');
        // }
    }

    public function anggaranDestroy(Request $req, $uuid)
    {
        $data = Anggaran_detail::where('uuid', $uuid)->first();

        $rincian = Rincian_sppd::findOrFail($data->rincian_sppd_id);
        // if (isset($data->harian)) {
        //     $harian = $data->harian->besar_pagu;
        // } else {
        //     $harian = 0;
        // }

        // if (isset($data->representasi)) {
        //     $representasi = $data->representasi->besar_pagu;
        // } else {
        //     $representasi = 0;
        // }

        // if (isset($data->penginapan)) {
        //     $penginapan = $data->penginapan->besar_pagu;
        // } else {
        //     $penginapan = 0;
        // }

        // if (isset($data->tiket)) {
        //     $tiket = $data->tiket->besar_pagu;
        // } else {
        //     $tiket = 0;
        // }

        // if (isset($data->taksi)) {
        //     $taksi = $data->taksi->besar_pagu;
        // } else {
        //     $taksi = 0;
        // }
        $rincian->total_anggaran = $rincian->total_anggaran - $data->total_anggaran;
        $rincian->update();

        $data->delete();

        return redirect()->route('rincianAnggaran', ['uuid' => $rincian->uuid])->withSuccess('Data berhasil diubah');
    }

}
