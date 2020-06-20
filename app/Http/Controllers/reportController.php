<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Anggaran;
use App\Disposisi_surat;
use App\Kategori;
use App\Laporan_sppd;
use App\Pegawai;
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
        $tgl_selesai = $request->tanggal_akhir;
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('formCetak.suratMasuk', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan data Surat Masuk .pdf');
    }

        //cetak laporan data Surat Keluar
        public function suratKeluar(Request $request){
            $data = Surat_keluar::whereBetween('tanggal_kirim', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_akhir; 
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.suratKeluar', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan data Surat Keluar .pdf');
        }

        //cetak laporan data Surat Disposisi
        public function suratDisposisi(Request $request){
            $data = Disposisi_surat::whereBetween('created_at', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_akhir;
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.suratDisposisi', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan data Disposisi Surat .pdf');
        }

        //cetak laporan Peminjaman
        public function peminjaman(Request $request){
            $data = Peminjaman::whereBetween('tanggal_pinjam', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_akhir;
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.peminjaman', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan data Peminjaman .pdf');
        }

        //cetak laporan SK
        public function sk(Request $request){
            $data = Sk::whereBetween('created_at', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_akhir;
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

        //cetak SPPD
        public function laporanSPPD($uuid){
            $data = Laporan_sppd::where('uuid',$uuid)->first();
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.laporanSPPD', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Laporan SPPD.pdf');
        }

        //cetak laporan data SPPD
        public function SPPDFilterWaktu(Request $request){
            $data = Sppd::whereBetween('tanggal_berangkat', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $data = $data->map(function ($item) {
                $jumlah = $item->rincian_sppd->count();
                $item['jumlah'] = $jumlah;
    
                return $item;
            });
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_akhir;
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.dataSPPD', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan SPPD .pdf');
        }

        //cetak laporan SPPD Filter Tujuan
        public function SPPDFilterTujuan(Request $request){
            $tujuan = Kategori::findOrFail($request->kategori_id);
            $data = SPPD::where('kategori_id',$request->kategori_id)->get();
            $data = $data->map(function ($item) {
                $jumlah = $item->rincian_sppd->count();
                $item['jumlah'] = $jumlah;
    
                return $item;
            });
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_akhir;
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.dataSPPDTujuan', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai,'tujuan'=>$tujuan]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan data SPPD Filter Tujuan .pdf');
        }

        //cetak laporan data SPPD
        public function SPPDAanggaran(Request $request){
            $data = Sppd::whereBetween('created_at', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $data = $data->map(function ($item) {
                $jumlah = $item->rincian_sppd->count();
                $item['jumlah_orang'] = $jumlah;
    
                return $item;
            });
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_akhir;
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.anggaranSPPD', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan SPPD .pdf');
        }

        //cetak Analisis SPPD
        public function analisisSPPD(){
            $data = Pegawai::all();
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.analisisSPPD', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Laporan Analisis SPPD.pdf');
        }

        //cetak Analisis SPPD
        public function analisisSurat(){
            $data =Agenda::all();
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.analisisSurat', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Laporan Analisis Surat.pdf');
        }

        //cetak laporan data SPPD
        public function anggaranFilter(Request $request){ 
            $data = Anggaran::where('tahun', [$request->tahun])->first();
            if($data){
                $sppd = Sppd::where('anggaran_id',$data->id)->get();
                $sppd = $sppd->map(function ($item) {
                    $jumlah = $item->rincian_sppd->count();
                    $item['jumlah_orang'] = $jumlah;
        
                    return $item;
                });
                $tgl= Carbon::now()->format('d-m-Y');
                $pdf =PDF::loadView('formCetak.anggaran', ['data'=>$data,'tgl'=>$tgl,'sppd'=>$sppd]);
                $pdf->setPaper('a4', 'landscape');
                return $pdf->stream('Laporan Anggaran .pdf');
            }else{
                return redirect()->route('anggaranSPPDfilter')->with('warning', 'Data Anggaran Tidak Ada');
            }
        }
}