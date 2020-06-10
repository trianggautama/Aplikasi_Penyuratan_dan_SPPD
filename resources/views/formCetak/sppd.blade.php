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

    </style>
</head>
<body>
    @foreach($data->rincian_sppd as $d)
    <div class="header">
            <div class="logo">
                    <img  class="pemko" src="logo.png">
            </div>
            <div class="headtext">
                <h3 style="margin:0px; text-transform:uppercase;">MAHKAMAH AGUNG REPUBLIK INDONESIA PENGADILAN NEGERI MARTAPURA</h3>
                <p style="margin:0px;">Alamat : Jl. Ahmad Yani No.32 Martapura Kalimantan Selatan</p>
                <p style="margin:0px;">Website : http://pn-martapura.go.id/, E-mail: pn_martapura@yahoo.co.id</p>
            </div>
    </div>
    <hr style="margin-top:0px;">
    <div class="container">
     <div class="text-right" style="text-align:right;margin-left:400px;">
     <table style=" width:70%; border:none; margin-bottom:20px;">
                <tr style="border:none;">
                    <td  style="border:none;" width="50%">Lembaran</td>
                    <td  style="border:none;">:</td>
                </tr>
                <tr  style="border:none;">
                    <td  style="border:none;">Kode Nomor</td>
                    <td  style="border:none;">:</td>
                </tr>
                <tr  style="border:none;">
                    <td  style="border:none;">Nomor</td>
                    <td  style="border:none;">:</td>
                </tr>
            </table>
     </div>
        <div class="isi">
            <table >
                <tr >
                    <td width="5%" class="text-center">1</td>
                    <td width="45%">Pengguna Anggaran (PA )</td>
                    <td>: Kepala Pengadilan Negeri Kabupaten Banjar </td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td>Nama/NIP Pegawai yang melaksanakan Perjalanan Dinas</td>
                    <td>: {{$d->pegawai->nama}} /NIP.{{$d->pegawai->NIP}}</td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td>
                        <p style="margin:5px;">a.Pangkat dan Golongan</p>
                        <p style="margin:5px;">b.Jabatan/ Instansi</p>
                        <p style="margin:5px;">c.Tingkat Perjalanan Dinas</p>
                    </td>
                    <td>
                        <p style="margin:5px;">a.{{$d->pegawai->golongan->kode_golongan}}</p>
                        <p style="margin:5px;">b. {{$d->pegawai->jabatan->jabatan}}</p>
                        <p style="margin:5px;">c. -</p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td>Maksud Perjalanan Dinas</td>
                    <td>: {{$d->sppd->maksud_tujuan}}</td>
                </tr>
                <tr>
                    <td class="text-center">5</td>
                    <td>Alat angkut yang dipergunakan</td>
                    <td>: {{$d->sppd->kategori->transportasi->nama_transportasi}}</td>
                </tr>
                <tr>
                    <td class="text-center">6</td>
                    <td>
                        <p style="margin:5px;">a.Tempat Berangkat</p>
                        <p style="margin:5px;">b.Tujuan Berangkat</p>
                    </td>
                    <td>
                        <p style="margin:5px;">a. Kabupaten Banjar</p>
                        <p style="margin:5px;">b. {{$d->sppd->kategori->kota->nama_kota}}</p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">7</td>
                    <td>
                        <p style="margin:5px;">a.Lamanya Perjanan Dinas</p>
                        <p style="margin:5px;">b.Tanggal Berangkat</p>
                        <p style="margin:5px;">c.Tanggal Harus Kembali/ tiba ditempat baru</p>
                    </td>
                    <td>
                        @php
                        $tgl_kepulangan = carbon\carbon::parse($d->sppd->tanggal_kepulangan)->translatedFormat('d F Y');
                        $tgl_berangkat = carbon\carbon::parse($d->sppd->tanggal_berangkat)->translatedFormat('d F Y');
                        $lama = carbon\carbon::parse($d->sppd->tanggal_kepulangan)->addDays(1)->diffInDays(carbon\carbon::parse($d->sppd->tanggal_kepulangan));
                        @endphp
                        <p style="margin:5px;">a. {{$lama}}/ hari</p>
                        <p style="margin:5px;">b. {{$tgl_berangkat}}</p>
                        <p style="margin:5px;">c.{{$tgl_kepulangan}}</p>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>PengikutNama</td>
                    <td>:</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>
                        <p style="margin:5px;">a.Instansi</p>
                        <p style="margin:5px;">b.Mata Anggaran</p>
                    </td>
                    <td>
                        <p style="margin:5px;">a.Pengadilan Negeri Kabupaten Banjar</p>
                        <p style="margin:5px;">b. DPPA SKPD Tahun Anggaran {{carbon\carbon::parse($tgl)->translatedFormat('Y')}}</p>
                    </td>
                </tr>
            </table>      
            <br><br>     
                      <br>
                      <br>
                      <div class="ttd">
                         <p style="margin:6px;"> Martapura, {{carbon\carbon::parse($tgl)->translatedFormat('d F Y')}}</p>
                       <h6 style="margin:0px;">Mengetahui</h6>
                      <h5 style="margin:0px;">Ketua Pengadilan</h5>
                      <br>
                      <br>
                      <h5 style="text-decoration:underline; margin:0px;">MAKMURIN KUSUMASTUTI, S.H,M.H.</h5>
                      <h5 style="margin:0px;">NIP. 19690306 199103 2 004</h5>
                      </div>
                    </div>
             </div>
             <div class="page-break"></div>
             @endforeach

         </body>
</html>