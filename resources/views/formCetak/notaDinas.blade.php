<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    h4,h2{
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
         width: 5%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         text-align: center;
         width: 100%;
         padding-left:0px;
         padding-top:20px !important;
     }
     hr{
         margin-top: 10%;
         height: 2px;
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

            <div class="headtext">
                <h2 style="margin:0px; text-transform:uppercase;">NOTA DINAS</h2>
                <br>
                <table width="100%" style="margin-bottom:20px;">
                    <tr>
                        <td width="20%">Kepada</td>
                        <td>: Ketua Pengadilan </td>
                    </tr>
                    <tr>
                        <td>Dari</td>
                        <td>:</td>
                    </tr>
                    <tr>
                        <td>Nomor</td>
                        <td>: ND/ &nbsp;&nbsp; /Pengadilan Negeri / I /  {{carbon\carbon::parse($tgl)->translatedFormat('Y')}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>: {{carbon\carbon::parse($tgl)->translatedFormat('d F Y')}}</td>
                    </tr>
                </table>
            </div>
            <br>
    </div>
    <div class="container">
        <div class="isi">
        <hr style="margin-top:0px;">
        <br>
        <p>&nbsp; &nbsp; Dalam rangka untuk menyampaikan hasil laporan {{$data->maksud_tujuan}}, maka kami berencana akan melakukan perjalanan dinas ke {{$data->kategori->kota->nama_kota}}</p>
        <p style="text-align:justify;"> &nbsp; &nbsp;Berkenaan dengan hal tersebut diatas, maka kami berencana untuk menugaskan 
        @foreach($data->rincian_sppd as $d)
        {{$d->pegawai->jabatan->jabatan}} ({{$d->pegawai->nama}}), &nbsp;
        @endforeach
        untuk melaksanakan kegiatan dimaksud pada tanggal {{carbon\carbon::parse($data->tanggal_berangkat)->translatedFormat('d F Y')}} {{carbon\carbon::parse($data->tanggal_kepulangan)->translatedFormat('d F Y')}} dengan menggunakan Dana yang bersumber dari DPPA-SKPD Belanja langsung Pengadilan Negeri Kabupaten Banjar TA. {{carbon\carbon::parse($tgl)->translatedFormat('Y')}}</p>            
        <p style="text-align:justify;"> &nbsp; &nbsp;Selanjutnya kami mohon arahan dan keputusan Bapak,bila bapak berkenan terlampir disampaikan SPT dan SPPD atas nama yang bersangkutan.</p>
        <p>&nbsp; &nbsp;	Demikian disampaikan,atas perkenan Bapak diucapkan terima kasih.</p>
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
                      <br>
                      <br>
                      <table style="border: 1px solid black; text-align:center">
                          <tr  style="border: 1px solid black;">
                              <td  style="border: 1px solid black;" width="50%">Sekretaris</td>
                              <td  style="border: 1px solid black;">Ketua Pengadilan</td>
                          </tr>
                          <tr  style="border: 1px solid black;" >
                              <td  style="border: 1px solid black;" width="50%">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                              </td>
                              <td  style="border: 1px solid black;">
                              <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                             </td>
                          </tr>
                      </table>
                    </div>
             </div>
         </body>
</html>