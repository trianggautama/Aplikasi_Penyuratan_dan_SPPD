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
         height: 1px;
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
    </style>
</head>
<body>
<div class="header">

            <div class="headtext">
                <table width="100%" style="margin-bottom:20px;">
                    <tr>
                        <td width="20%">Kode Rekening</td>
                        <td width="30%">: 5.2.2.15.02 </td>
                        <td width="20%">No. DPPA</td>
                        <td width="30%"> : 2.05.2.05.01.00.15.15.5.2. </td>
                    </tr>
                    <tr>
                        <td width="20%">Tahun Anggaran</td>
                        <td>: {{carbon\carbon::parse($tgl)->translatedFormat('Y')}}</td>
                        <td width="20%">No. BKU</td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td width="20%">Nama Kegiatan</td>
                        <td>: {{$data->maksud_tujuan}}</td>
                        <td width="20%">Paraf</td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td width="20%">Jenis Pengeluaran</td>
                        <td>: Belanja Perjalanan Dinas</td>
                        <td width="20%"></td>
                        <td>: </td>
                    </tr>
                </table>

            </div>
            <br>
    </div>
    <div class="container">
        <div class="isi">
        <br>
        <h2 style="margin:0px; text-transform:uppercase; text-align:center">KUITANSI</h2>
        <br>
        <table>
            <tr>
                <td width="20%">Sudah Terima dari</td>
                <td width="5%">:</td>
                <td><p style="text-align: justify;">Bendahara Pengeluaran pada Pengadilan Negeri Kabupaten Banjar</p></td>
            </tr>
            <tr>
            @php
                        $tgl_kepulangan = carbon\carbon::parse($data->tanggal_kepulangan)->translatedFormat('d F Y');
                        $tgl_berangkat = carbon\carbon::parse($data->tanggal_berangkat)->translatedFormat('d F Y');
                        $lama = carbon\carbon::parse($data->tanggal_kepulangan)->addDays(1)->diffInDays(carbon\carbon::parse($data->tanggal_kepulangan));
                        @endphp
                <td width="20%">Untuk Pembayaran</td> 
                <td width="5%">:</td>
                <td><p style="text-align: justify;"> Belanja Perjalanan Dinas  Dalam Rangka {{$data->maksud_tujuan}}, selama {{$lama}} Hari, Tmt {{$tgl_berangkat}} sampai {{$tgl_kepulangan}}</p></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td width="10%">Jumlah</td>
                <td width="5%">:</td>
                <td>-</td>
            </tr>
            <tr>
                <td width="10%">Ppn</td>
                <td width="5%">:</td>
                <td>-</td>
            </tr>
            <tr>
                <td colspan="3">------------------------------------------</td>
            </tr>
        </table>
        @php
            $total_harga = $data->rincian_sppd->sum('total_anggaran');
        @endphp
        <p>Rp. {{$total_harga}},-</p>
        <br>
        <br>
        <table class="text-center">
            <tr>
                <td>Pengguna Anggaran</td>
                <td>Bendahara Pengeluaran</td>
                <td>Yang Menerima,</td>
            </tr>
            <tr>
                <td> 
                    <br>
                    <br>
                    <br> 
                    Drs. H. Ardiansyah 
                    <br> 
                    NIP. 19590508 198403 1 009
                </td>
                <td>
                    <br>
                    <br>
                    <br>
                    Nana Rosalina
                    <br>
                    NIP. 19810220 200901 2 007
                </td>
                <td>
                    <br>
                    <br>
                    <br>
                    Hj. Katerina S.Sos. MAP
                    <br>
                    NIP. 1964331 1987022003
                </td>
            </tr>
        </table>
        <br>
        <br>
        <table class="text-center">
            <tr>
                <td>
                Mengetahui : <br> Pejabat Pelaksana Teknis Kegiatan
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    <br>
                    <br>
                    Drs. Musyridyansyah, M. Si
                    <br>
                    NIP. 19730208 199302 1 001
                </td>
            </tr>
        </table>
             </div>
         </body>
</html>