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
     @page { 
         size: 215 mm 330 mm ; 
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
            <h4 style="text-align:center;">LAPORAN HASIL PERJALANAN DINAS</h4>
            <table>
                <tr>
                    <td width="10%" class="text-center">I</td>
                    <td style="padding:10px;">
                        <b>Maksud Perjalanan Dinas</b>
                        <p>{{$data->sppd->maksud_tujuan}}</p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">II</td>
                    <td style="padding:10px;">    
                        <b>Waktu dan Tempat Pelaksanaan</b>
                        <p>1. Waktu &nbsp;&nbsp;: {{carbon\carbon::parse($data->sppd->tanggal_berangkat)->translatedFormat('d F Y')}} sampai {{carbon\carbon::parse($data->sppd->tanggal_kepulangan)->translatedFormat('d F Y')}} <br>
                           2. Tempat  : {{$data->sppd->tempat}}
                    </p> 
                    </td>
                </tr>
                <tr>
                    <td width="10%" class="text-center">III</td>
                    <td style="padding:10px;">
                        <b>Laporan Hasil Perjalanan Dinas</b> <br>
                        <p>{!! $data->isi !!}</p>
                    </td>
                </tr>
            </table>
                      <br>
                      <br>
                      <div class="ttd">
                         <p style="margin:6px;"> Martapura, {{carbon\carbon::parse($tgl)->translatedFormat('d F Y')}}</p>
                      <h5 style="margin:0px;">{{$data->sppd->rincian_sppd->first()->pegawai->jabatan->jabatan}}</h5>
                      <br>
                      <br>
                      <h5 style="text-decoration:underline; margin:0px;">{{$data->sppd->rincian_sppd->first()->pegawai->nama}}</h5>
                      <h5 style="margin:0px;">NIP. {{$data->sppd->rincian_sppd->first()->pegawai->NIP}}</h5>
                      </div>
                    </div>
             </div>
         </body>
</html>