@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Halaman SPPD</h2>
            </div>
            <div class="d-flex">
            </div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-12">

                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Data Table</h5>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tujuan</th>
                                                    <th>Transportasi</th>
                                                    <th>Tanggal Berangkat</th>
                                                    <th>Tanggal Kepulangan</th>
                                                    <th>Maksud Tujuan</th>
                                                    <th>Jumlah Orang</th>
                                                    <th>Jumlah Biaya</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sppd as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>Dari {{$d->berangkat->nama_kota}} - Ke {{$d->tujuan->nama_kota}}
                                                    </td>
                                                    <td>{{$d->transportasi->nama_transportasi}}</td>
                                                    <td>{{carbon\carbon::parse($d->tanggal_berangkat)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td>{{carbon\carbon::parse($d->tanggal_kepulangan)->translatedFormat('d F Y')}} 
                                                    </td>
                                                    <td>{{$d->maksud_tujuan}}</td>
                                                    <td>{{$d->jumlah_orang}} Orang</td>
                                                    <td>@currency($d->total),-</td>
                                                    <td>
                                                        <a href="{{Route('pembatalanRincianSPPDShow',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-info m-1"><span class="icon-label"><i
                                                                    class="fa fa-file-text"></i>
                                                            </span><span class="btn-text">Surat Pembatalan </span></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->

</div>
<!-- /Main Content -->

@endsection
@section('scripts')
<script>
</script>
@endsection