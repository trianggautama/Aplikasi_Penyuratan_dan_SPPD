<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    h4,h2,h3{
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
         height: 130px;
         padding: 0px;
     }
     .pemko{
         width:80px;
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
     @page { 
         size: 215 mm 330 mm ; 
        }

    </style>
</head>
<body>
    <div class="header">
            <div class="text-center">
                <img  class="pemko" src="logo.png">
                <h3 style="margin:0px; text-transform:uppercase;">PENGADILAN NEGERI MARTAPURA KELAS IB</h3>
            </div>
    </div>
    <div class="container">
        <div class="isi">
            <h3 style="text-align:center; text-decoration:underline;margin:0px;">SURAT TUGAS</h3>
            <h3 style="text-align:center; margin:0px;">Nomor  W15.U3/&nbsp;&nbsp;&nbsp;&nbsp;/UM.03.02/III/{{carbon\carbon::parse($tgl)->translatedFormat('Y')}}</p>
            <br>
            <br>
            <p style="text-align:center; margin:0px;">SEKRETARIS  PENGADILAN NEGERI MARTAPURA KELAS IB</p>
            <p>Yang bertanda tangan di bawah ini :</p>
            <table>
                <tr>
                    <td>Dasar :</td>
                    <td>  <ol>
                            <li<p style="text-align:justify; margin-bottom:5px;">Bahwa dalam rangka tertib administrasi Pelaksanaan Anggaran Pendapatan dan Belanja Negara tahun anggaran {{carbon\carbon::parse($tgl)->translatedFormat('Y')}} di lingkungan Pengadilan Negeri Martapura </p></li>

                            <li<p style="text-align:justify">DIPA Pengadilan Negeri Martapura Nomor : SP DIPA-005.01.2.099230/{{carbon\carbon::parse($tgl)->translatedFormat('Y')}}</p></li>
                          </ol>
                    </td>
                </tr>
            </table>
            <br>
            <p style="text-align:center; margin:0px;">MEMBERIKAN TUGAS :</p>
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
                      <table>
                <tr>
                    <td>Dasar :</td>
                    <td>
                        <p style="text-align: justify;">Perjalanan dinas luar daerah untuk mendukung kelancaran pembuatan rekapitulasi data Pengadilan Negeri Martapura Nomor 005.01.2.099230/2020   pada tanggal {{carbon\carbon::parse($data->tanggal_berangkat)->translatedFormat('d F Y')}} sampai {{carbon\carbon::parse($data->tanggal_kepulangan)->translatedFormat('d F Y')}}.</p>
                        <p>Demikian surat tugas ini dibuat untuk dilaksanakan dengan penuh rasa tanggung jawab.</p>  
                    </td>
                </tr>
            </table>
                      <br>
                      <br>
                      <br>
                      <div class="ttd">
                         <p style="margin:6px;"> Martapura, {{carbon\carbon::parse($tgl)->translatedFormat('d F Y')}}</p>
                       <h6 style="margin:0px;">Mengetahui</h6>
                      <h5 style="margin:0px;">Plh. Sekretaris Pengadilan Negeri Martapura,</h5>
                      <br>
                      <br>
                      <br>
                      <h5 style=" margin:0px;">BUTET SARMA, SE</h5>
                      </div>
                    </div>
             </div>
         </body>
</html>