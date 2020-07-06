<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    h4,h2{
        font-family:serif;
    }
        body{
            font-family:sans-serif;
        }
        table{
        border-collapse: collapse;
        width:100%;
      }
      table, th, td{
        border: 1px solid black;
      }
      th{
        text-align: center;
      }
      td{
      }
      br{
          margin-bottom: 5px !important;
      }
     .judul{
         text-align: center;
     }
     .header{
         margin-bottom: 0px;
         text-align: center;
         height: 150px;
         padding: 0px;
     }
     .pemko{
         width:100px;
     }
     .logo{
         float: left;
         margin-right: 0px;
         width: 18%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         float:right;
         margin-left: 0px;
         width: 72%;
         padding-left:0px;
         padding-right:10%;
         padding-top:20px !important;
     }
     hr{
         margin-top: 10%;
         height: 4px;
         background-color: black;
         width:100%;
     }
     .ttd{
         margin-left:65%;
         text-align: center;
         text-transform: uppercase;
     }
     .text-right{
         text-align:right;
     }
     .text-center{
         text-align:center;
     }
     .isi{
         padding:10px;
     }
     .page-break { 
         page-break-before: always; 
    }
    @page { 
         size: 215 mm 330 mm ; 
        }

    </style>
</head>
<body>
    <div class="text-right" style="text-align:left;margin-left:450px;">
        <p style="font-size:8px">LAMPIRAN I <br>
                    PERATURAN MENTERI KEUANGAN REPUBLIK INDONESIA <br>
                    NOMOR 113/PMK.05/2012 <br>
                    TENTANG <br>
                    PERJALANAN DINAS JABATAN DALAM NEGERI BAGI PEJABAT <br>
                    NEGARA, PEGAWAI NEGERI, DAN PEGAWAI TIDAK TETAP
                </p>
     </div>
    <div class="container">
        <div class="isi">
        <table style="border:none;">
         <tr style="border:none;">
             <td style="border:none;">
                 <p style="border:none;">Pengadilan Negeri Martapura</p>
             </td>
             <td style="border:none;">
                 <p style="border:none;">
                     Lembaran Ke : - <br>
                     Kode No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <br>
                     Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                 </p>
             </td>
         </tr>
     </table>
     <br>
     <p style="text-align: center;">SURAT PERJALANAN DINAS (SPD)</p>
            <table >
                <tr >
                    <td width="5%" class="text-center">1</td>
                    <td width="45%">Pejabat Pembuat Kometmen  </td>
                    <td colspan="2"> Kepala Pengadilan Negeri Kabupaten Banjar </td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td>Nama/NIP Pegawai yang melaksanakan Perjalanan Dinas</td>
                    <td colspan="2"> {{$data->rincian_sppd->first()->pegawai->nama}} /NIP.{{$data->rincian_sppd->first()->pegawai->NIP}}</td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td>
                        <p style="margin:5px;">a.Pangkat dan Golongan</p>
                        <p style="margin:5px;">b.Jabatan/ Instansi</p>
                        <p style="margin:5px;">c.Tingkat Perjalanan Dinas</p>
                    </td>
                    <td colspan="2">
                        <p style="margin:5px;">a.{{$data->rincian_sppd->first()->pegawai->golongan->kode_golongan}}</p>
                        <p style="margin:5px;">b. {{$data->rincian_sppd->first()->pegawai->jabatan->jabatan}}</p>
                        <p style="margin:5px;">c. -</p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td>Maksud Perjalanan Dinas</td>
                    <td colspan="2"> {{$data->maksud_tujuan}}</td>
                </tr>
                <tr>
                    <td class="text-center">5</td>
                    <td>Alat angkut yang dipergunakan</td>
                    <td colspan="2"> {{$data->kategori->transportasi->nama_transportasi}}</td>
                </tr>
                <tr>
                    <td class="text-center">6</td>
                    <td>
                        <p style="margin:5px;">a.Tempat Berangkat</p>
                        <p style="margin:5px;">b.Tujuan Berangkat</p>
                    </td>
                    <td colspan="2">
                        <p style="margin:5px;">a. Martapura  (Kal – Sel )</p>
                        <p style="margin:5px;">b. {{$data->kategori->kota->nama_kota}}</p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">7</td>
                    <td>
                        <p style="margin:5px;">a.Lamanya Perjanan Dinas</p>
                        <p style="margin:5px;">b.Tanggal Berangkat</p>
                        <p style="margin:5px;">c.Tanggal Harus Kembali/ tiba ditempat baru</p>
                    </td>
                    <td colspan="2">
                        @php
                        $tgl_kepulangan = carbon\carbon::parse($data->tanggal_kepulangan)->translatedFormat('d F Y');
                        $tgl_berangkat = carbon\carbon::parse($data->tanggal_berangkat)->translatedFormat('d F Y');
                        $lama = carbon\carbon::parse($data->tanggal_kepulangan)->addDays(1)->diffInDays(carbon\carbon::parse($data->tanggal_kepulangan));
                        @endphp
                        <p style="margin:5px;">a. {{$lama}}/ hari</p>
                        <p style="margin:5px;">b. {{$tgl_berangkat}}</p>
                        <p style="margin:5px;">c. {{$tgl_kepulangan}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="border:none" class="text-center" >8</td>
                    <td class="text-center">Pengikut : Nama</td>
                    <td class="text-center" >Tanggal Lahir</td>
                    <td class="text-center" >Keterangan</td>
                </tr>
                    @foreach($data->rincian_sppd as $d)
                        @if($loop->iteration != 1)
                            <tr>
                                <td style="border:none"></td>
                                <td>{{$loop->iteration - 1}}. {{$d->pegawai->nama}}</td>
                                <td >{{$loop->iteration - 1}}. </td>
                                <td >{{$loop->iteration - 1}}.</td>
                            </tr>
                        @else
                        <tr>
                                <td style="border:none"></td>
                                <td>-</td>
                                <td >-</td>
                                <td >-</td>
                            </tr>
                        @endif
                    @endforeach
                <tr>
                    <td class="text-center">9</td>
                    <td>
                        <p>Pembebanan Anggaran</p>
                        <p style="margin:5px;">a.Instansi</p>
                        <p style="margin:5px;">b.Mata Anggaran</p>
                    </td>
                    <td  colspan="2">
                        <p>DIPA Th. Anggaran </p>
                        <p style="margin:5px;">a.Pengadilan Negeri Kabupaten Banjar</p>
                        <p style="margin:5px;">b. {{$data->anggaran->nama_anggaran}}</p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">10</td>
                    <td>
                        Keterangan Lain-lain
                    </td>
                    <td colspan="2">
                    
                    </td>
                </tr>
            </table>      
            <br><br>     
                      <br>
                      <br>
                      <div class="ttd">
                         <p style="margin:6px;"> Martapura, {{carbon\carbon::parse($data->created_at)->translatedFormat('d F Y')}}</p>
                       <h6 style="margin:0px;">Mengetahui</h6>
                      <h5 style="margin:0px;">PEJABAT PEMBUAT KOMITMEN	PENGADILAN NEGERI MARTAPURA</h5>
                      <br>
                      <br>
                      <h5 style="text-decoration:underline; margin:0px;">H. AKHMAD SYIRAJUDDIN, SE</h5>
                      <h5 style="margin:0px;">  NIP.19701025 199103 1 001</h5>
                      </div>
                    </div>
             </div>
         </body>
</html>