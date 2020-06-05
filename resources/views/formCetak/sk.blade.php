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
        text-align: center;
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
            <h4 style="text-align:center;">AGENDA SK dari tanggal {{carbon\carbon::parse($tgl_mulai)->translatedFormat('d F Y')}} SAMPAI TANGGAL {{carbon\carbon::parse($tgl_selesai)->translatedFormat('d F Y')}}</h4>
            <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Register</th>
                                                    <th>Nomor Register</th>
                                                    <th>Jenis SK</th>
                                                    <th>Pemohon</th>
                                                    <th>Identitas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{carbon\carbon::parse($d->tanggal_registrasi)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td>{{$d->nomor_register}}</td>
                                                    <td>{{$d->jenis_surat->jenis_surat}}</td>
                                                    <td>{{$d->pemohon}}</td>
                                                    <td>{{$d->identitas}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
         </body>
</html>