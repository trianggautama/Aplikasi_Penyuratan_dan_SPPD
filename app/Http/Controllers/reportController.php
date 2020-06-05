<?php

namespace App\Http\Controllers;

use App\Surat_keluar;
use App\Surat_masuk;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class reportController extends Controller
{
    //cetak laporan data Surat Masuk
    public function suratMasuk(Request $request){
        $data = Surat_masuk::whereBetween('tanggal_terima', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
        $tgl_mulai = $request->tanggal_mulai;
        $tgl_selesai = $request->tanggal_selesai;
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('formCetak.suratMasuk', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan data pengujian Berdasarkan Status .pdf');
    }

        //cetak laporan data Surat Keluar
        public function suratKeluar(Request $request){
            $data = Surat_keluar::whereBetween('tanggal_kirim', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_selesai;
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.suratKeluar', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan data pengujian Berdasarkan Status .pdf');
        }
}
