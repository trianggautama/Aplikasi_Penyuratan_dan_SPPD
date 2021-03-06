<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Anggaran;
use App\Disposisi_surat;
use App\Kategori;
use App\Laporan_sppd;
use App\Pegawai;
use App\Pejabat;
use App\Pembatalan_rincian_sppd;
use App\Pembatalan_sppd;
use App\Peminjaman;
use App\Rincian_sppd;
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
            $anggaran = Anggaran::latest()->first();
            $pejabat = Pejabat::latest()->first();
            $pdf =PDF::loadView('formCetak.notaDinas', ['data'=>$data,'tgl'=>$tgl,'anggaran'=>$anggaran,'pejabat'=>$pejabat]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Nota Dinas SK .pdf');
        }

        //cetak laporan Surat Tugas
        public function suratTugas($uuid){
            $data = Sppd::where('uuid',$uuid)->first();
            $tgl= Carbon::now()->format('d-m-Y');
            $anggaran = Anggaran::latest()->first();
            $pejabat = Pejabat::latest()->first();
            $pdf =PDF::loadView('formCetak.suratTugas', ['data'=>$data,'tgl'=>$tgl,'anggaran'=>$anggaran,'pejabat'=>$pejabat]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Surat Tugas .pdf');
        }

        //cetak SPPD
        public function SPPD($uuid){
            $data = Sppd::where('uuid',$uuid)->first();
            $tgl= Carbon::now()->format('d-m-Y');
            $anggaran = Anggaran::latest()->first();
            $pejabat = Pejabat::latest()->first();
            $pdf =PDF::loadView('formCetak.sppd', ['data'=>$data,'tgl'=>$tgl,'anggaran'=>$anggaran,'pejabat'=>$pejabat]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('SPPD.pdf');
        }

        //cetak KUITANSI
        public function kuitansi($uuid){
            $data = Sppd::where('uuid',$uuid)->first();
            $tgl= Carbon::now()->format('d-m-Y');
            $pejabat = Pejabat::latest()->first();
            $pdf =PDF::loadView('formCetak.kuitansi', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
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
            $data = Sppd::whereBetween('tanggal_berangkat', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
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
            $data = Pegawai::all()->map(function($item){
                $item->sppd = $item->rincian_sppd->count();
                return $item;
            })->sortByDesc('sppd');
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.analisisSPPD', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Laporan Analisis SPPD.pdf');
        }

        //cetak Analisis Surat Masuk
        public function analisisSuratMasuk(){
            $data =Agenda::all()->map(function($item){
                $item->surat_masuk = $item->surat_masuk->count();
                return $item;
            })->sortByDesc('surat_masuk');
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.analisisSuratMasuk', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Laporan Analisis Surat Masuk.pdf');
        }


        //cetak Analisis Surat Keluar
        public function analisisSuratKeluar(){
            $data =Agenda::all()->map(function($item){
                $item->surat_keluar = $item->surat_keluar->count();
                return $item;
            })->sortByDesc('surat_keluar');
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.analisisSuratKeluar', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Laporan Analisis Surat Keluar.pdf');
        }

        //cetak laporan data SPPD
        public function anggaranFilter(Request $request){ 

            $data = Kategori::where('kategori', $request->uraian)->get();
                $tgl= Carbon::now()->format('d-m-Y');
                $pdf =PDF::loadView('formCetak.anggaran', ['data'=>$data,'tgl'=>$tgl]);
                $pdf->setPaper('a4', 'landscape');
                return $pdf->stream('Laporan Anggaran .pdf');
        }

        //cetak Pegawai
        public function pegawai(){
            $data =Pegawai::latest()->get();
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.pegawai', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Laporan Pegawai.pdf');
        }

        //cetak Rincian Anggaran
        public function anggaranDetail($uuid){
            $data =Rincian_sppd::where('uuid',$uuid)->first();
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.rincianAnggaran', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Laporan Rincian Anggaran.pdf');
        }

        //cetak laporan data SPPD
        public function pengeluaranSPPD(Request $request){
            $data = Sppd::whereBetween('tanggal_berangkat', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $data = $data->map(function ($item) {
                $jumlah = $item->rincian_sppd->count();
                $total = $item->rincian_sppd->sum('total_anggaran');
                $item['jumlah_orang'] = $jumlah;
                $item['total'] = $total;

            return $item;
            });
            $tgl_mulai = $request->tanggal_mulai;
            $tgl_selesai = $request->tanggal_akhir;
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.pengeluaranSPPD', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_selesai'=>$tgl_selesai]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan Pengeluaran SPPD .pdf');
        }

        //cetak Pembatalan SPPD
            public function pembatalanSPPD($uuid){
                $data = Pembatalan_sppd::where('uuid',$uuid)->first();
                $tgl= Carbon::now()->format('d-m-Y');
                $pdf =PDF::loadView('formCetak.pembatalanSPPD', ['data'=>$data,'tgl'=>$tgl]);
                $pdf->setPaper('a4', 'portrait');
                return $pdf->stream('Laporan Pembatalan SPPD.pdf');
            }

        //cetak Pembatalan SPPD
        public function pembatalanRincianSPPD($uuid){
            $data = Pembatalan_rincian_sppd::where('uuid',$uuid)->first();
            $tgl= Carbon::now()->format('d-m-Y');
            $pdf =PDF::loadView('formCetak.pembatalanRincianSPPD', ['data'=>$data,'tgl'=>$tgl]);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->stream('Laporan Rincian Pembatalan SPPD.pdf');
        }
}
