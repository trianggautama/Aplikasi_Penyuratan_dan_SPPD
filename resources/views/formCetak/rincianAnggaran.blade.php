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
            <h4 style="text-align:center;">RINCIAN ANGGARAN RIIL</h4>
            <p style="margin:0px;">Nomor SPPD: {{$data->sppd->id}}</p> 
            <p style="margin:0px;">Pegawai: {{$data->pegawai->nama}}/ {{$data->pegawai->NIP}}</p>
            <p style="margin:0px;">Tujuan: {{$data->sppd->berangkat->nama_kota}}- {{$data->sppd->tujuan->nama_kota}}</p>
            <p style="margin:0px;">Tanggal: {{carbon\carbon::parse($data->sppd->tanggal_berangkat)->translatedFormat('d F Y')}} - {{carbon\carbon::parse($data->sppd->tanggal_kembali)->translatedFormat('d F Y')}}</p>
            <br>
            <br>
            <table>
               <tr>
                    <th>Keperluan</th>
                    <th>Catatan</th>
                    <th>Besaran Riil</th>
               </tr>
                @foreach($data->anggaran_detail as $d)s
                <tr>
                    <td width="50%">{{$d->kategori->uraian}}</td>
                    <td width="30%">{{$d->catatan}}</td>
                    <td width="20%">@currency($d->besaran)</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2">Total</td>
                    <td>@currency($data->anggaran_detail->sum('besaran'))</td>
                </tr>
            </table>
                      <br>
                      <br>
                    </div>
             </div>
         </body>
</html>