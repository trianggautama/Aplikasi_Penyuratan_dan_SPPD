<?php

namespace App\Http\Controllers;

use App\Disposisi_surat;
use App\Peminjaman;
use App\Sk;
use App\Sppd;
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
        return $pdf->stream('Laporan data Surat Masuk .pdf');
    }

        //cetak laporan data Surat Keluar
        public function suratKeluar(Request $request){
            $data = Surat_keluar::whereBetween('tanggal_kirim', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_selesai;
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.suratKeluar', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan data Surat Keluar .pdf');
        }

        //cetak laporan data Surat Disposisi
        public function suratDisposisi(Request $request){
            $data = Disposisi_surat::whereBetween('created_at', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_selesai;
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.suratDisposisi', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan data Disposisi Surat .pdf');
        }

        //cetak laporan Peminjaman
        public function peminjaman(Request $request){
            $data = Peminjaman::whereBetween('created_at', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_selesai;
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.peminjaman', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan data Peminjaman .pdf');
        }

        //cetak laporan SK
        public function sk(Request $request){
            $data = Sk::whereBetween('created_at', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_selesai;
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.sk', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan data SK .pdf');
        }

        //cetak laporan Nota Dinas
        public function notaDinas($uuid){
            $data = Sppd::where('uuid',$uuid)->first();
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.notaDinas', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Nota Dinas SK .pdf');
        }

        //cetak laporan Surat Tugas
        public function suratTugas($uuid){
            $data = Sppd::where('uuid',$uuid)->first();
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.suratTugas', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Surat Tugas .pdf');
        }

        //cetak SPPD
        public function SPPD($uuid){
            $data = Sppd::where('uuid',$uuid)->first();
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.sppd', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('SPPD.pdf');
        }

        //cetak SPPD
        public function kuitansi($uuid){
            $data = Sppd::where('uuid',$uuid)->first();
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.kuitansi', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('kuitansi.pdf');
        }
}
