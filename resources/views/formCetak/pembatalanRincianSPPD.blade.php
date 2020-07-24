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
            <h3 style="text-align:center; text-decoration:underline;margin:0px;">SURAT PEMBATALAN SPPD</h3>
            <h3 style="text-align:center; margin:0px;">Nomor  W15.U3/{{$data->no_surat}}/UM.03.02/{{carbon\carbon::parse($data->created_at)->translatedFormat('m')}}/{{carbon\carbon::parse($tgl)->translatedFormat('Y')}}</p>
            <br>
            <br>
            <br><br>
            <p style="text-align:center; margin:0px;">SEKRETARIAT PENGADILAN NEGERI MARTAPURA KELAS IB</p>
            <p>Yang bertanda tangan di bawah ini :</p>
            <table>
                <tr>
                    <td width="25%">Nama</td>
                    <td width="3%">:</td>
                    <td>  
                        {{$data->pegawai->nama}}
                    </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>  
                        {{$data->pegawai->jabatan->jabatan}}
                    </td>
                </tr>
            </table>
            <br>
            <p style="text-align:left; margin:0px;">Menyatakan Dengan sesungguhnya, Bahwa Perjalanan Dinas sebagai berikut :</p>
            <br>
            <table>
                <tr>
                    <td width="25%">Nama pegawai</td>
                    <td width="3%">:</td>
                    <td>  
                        {{$data->rincian_sppd->pegawai->nama}} / {{$data->rincian_sppd->pegawai->NIP}}
                    </td>
                </tr>
                <tr>
                    <td width="25%">Jabatan</td>
                    <td width="3%">:</td>
                    <td>  
                        {{$data->rincian_sppd->pegawai->jabatan->jabatan}} 
                    </td>
                </tr>
                <tr>
                    <td width="25%">nomor Surat Tugas</td>
                    <td width="3%">:</td>
                    <td>  
                        {{$data->sppd->no_surat_tugas}}
                    </td>
                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>:</td>
                    <td>  
                        {{$data->sppd->berangkat->nama_kota}} - {{$data->sppd->tujuan->nama_kota}}
                    </td>
                </tr>
                <tr>
                    <td>Tempat</td> 
                    <td>:</td>
                    <td>  
                        {{$data->sppd->tempat}}
                    </td>
                </tr>
                <tr>
                    <td>Maksud Tujuan</td>
                    <td>:</td>
                    <td>  
                        {{$data->sppd->maksud_tujuan}}
                    </td>
                </tr>
                <tr>
                    <td>Total Anggaran Riil</td>
                    <td>:</td>
                    <td>  
                        @currency($data->rincian_sppd->total_anggaran)
                    </td>
                </tr>
            </table>
            <br>
            <p style="text-align: justify;">dibatalkan atau tidak daat dilaksanakan dengan alasan, sehubungan dengan pembatalan tersebut, pelaksanaan perjalanan dinas tidak dapat digantikan oleh pejabat/pegawai negeri lain.  </p>
            <p style="text-align: justify;">Demikian surat pernyataan ini dibuat dengan sebenarnya dan apabila dikemudian hari ternyata surat penyataan ini tidak benar. saya bertanggungjawab penuh dan bersedia diproses sesuai dengan ketentuan hukum yang berlaku</p>
            
                      <br>
                      <br>
                      <br>
                      <div class="ttd">
                         <p style="margin:6px;"> Martapura, {{carbon\carbon::parse($data->created_at)->translatedFormat('d F Y')}}</p>
                       <h6 style="margin:0px;">Mengetahui</h6>
                      <h5 style="margin:0px;">{{$data->pegawai->jabatan->jabatan}},</h5>
                      <br>
                      <br>
                      <br>
                      <h5 style=" margin:0px;text-decoration:underline;">{{$data->pegawai->nama}}</h5>
                      <h5 style=" margin:0px;">{{$data->pegawai->NIP}}</h5>
                      </div>
                    </div>
             </div>
         </body>
</html>