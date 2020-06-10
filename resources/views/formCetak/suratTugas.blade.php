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
     .isi{
         padding:10px;
     }
    </style>
</head>
<body>
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
        <div class="isi">
            <h2 style="text-align:center; text-decoration:underline;margin:0px;">SURAT PERINTAH TUGAS</h2>
            <p style="text-align:center; margin:0px;">Nomor : &nbsp;&nbsp; &nbsp;&nbsp;/  &nbsp;&nbsp;&nbsp;&nbsp;/ PENGADILAN-NEGERI/{{carbon\carbon::parse($tgl)->translatedFormat('Y')}}</p>
            <br>
            <br>
            <table>
                <tr>
                    <td>Dasar :</td>
                    <td>  <ol>
                            <li<p style="text-align:justify; margin-bottom:5px;">Dokumen Pelaksanaan Perubahan Anggaran Satuan Kerja Perangkat Daerah DPPA-SKPD)Tahun Anggaran {{carbon\carbon::parse($tgl)->translatedFormat('Y')}} Kegiatan  Rpat-rapat Koordinasi dan Konsultasi,No.DPPA-2.05.01.2.05.01.00.01.82.5.2P</p></li>

                            <li<p style="text-align:justify">Nota Persetujuan Ketua Pengadilan Kabupaten Banjar untuk mendukung kelancaran pembuatan rekapitulasi data pelayanan pencatatan sipil.</p></li>
                          </ol>
                    </td>
                </tr>
            </table>
            <br>
            <p style="text-align:center; margin:0px;">MEMERINTAHKAN :</p>
            <p>Kepada:</p>
                @foreach($data->rincian_sppd as $d)
                    <table style="margin-left:100px; margin-bottom:15px;">
                        <tr>
                            <td width="20%">Nama</td>
                            <td>: {{$d->pegawai->nama}}</td>
                        </tr>
                        <tr>
                            <td>Pangkat/Golongan</td>
                            <td>: {{$d->pegawai->golongan->kode_golongan}}/ {{$d->pegawai->golongan->golongan}}</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>: {{$d->pegawai->NIP}}</td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>: {{$d->pegawai->jabatan->jabatan}}</td>
                        </tr>
                    </table>
                @endforeach
                      <br>
                      <table>
                <tr>
                    <td>Dasar :</td>
                    <td>
                        <p style="text-align: justify;">Perjalanan dinas luar daerah untuk mendukung kelancaran pembuatan rekapitulasi data pelayanan disdukcapil kabupaten kota  pada tanggal {{carbon\carbon::parse($data->tanggal_berangkat)->translatedFormat('d F Y')}} sampai {{carbon\carbon::parse($data->tanggal_kepulangan)->translatedFormat('d F Y')}}.</p>  
                    </td>
                </tr>
            </table>
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
         </body>
</html>