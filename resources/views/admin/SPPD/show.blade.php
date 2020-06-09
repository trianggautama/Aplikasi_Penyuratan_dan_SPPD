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
                <button class="btn btn-sm btn-danger btn-wth-icon icon-wthot-bg mb-15"><span class="icon-label"><i
                            class="fa fa-print"></i> </span><span class="btn-text">Cetak Kuitansi SPPD
                    </span></button>
            </div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Detail Data</h5>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">Kategori</h5>
                                                    <p>Luar Derah luar Provinsi</p>
                                                </div>
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">tujuan</h5>
                                                    <p>Bandung</p>
                                                </div>
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">Transportasi</h5>
                                                    <p>Pesawat Terbang</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">Tanggal Berangkat</h5>
                                                    <p>1 Juli 2020</p>
                                                </div>
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">Tanggal Kepulangan</h5>
                                                    <p>4 Juli 2020</p>
                                                </div>
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">Maksud Keberangkatan</h5>
                                                    <p>Menghadiri Penilaian Kementrian</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <button class="btn btn-sm btn-danger btn-wth-icon icon-wthot-bg mb-15" id="tambah"><span
                    class="icon-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Tambah Pegawai
                </span></button>
        </div>

        <section class="hk-sec-wrapper">
            <h5 class="hk-sec-title">Rincian Pegawai</h5>
            <br>
            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">
                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Golongan </th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->rincian_sppd as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->pegawai->nama}}</td>
                                    <td>{{$d->pegawai->NIP}}</td>
                                    <td>{{$d->pegawai->golongan->golongan}}</td>
                                    <td>{{$d->pegawai->jabatan->jabatan}}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-outline-light m-1"><span class="icon-label"><i
                                                    class="fa fa-info-circle"></i> </span><span class="btn-text">
                                            </span></a>
                                        <button class="btn btn-sm btn-danger m-1" onclick="Hapus('')"> <i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Golongan </th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /Container -->
</div>
<!-- /Main Content -->

<!-- Modal forms-->
<div class="modal fade" id="exampleModalForms" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="status">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('rincianStore')}}" method="POST">
                    @csrf
                    <input type="hidden" name="sppd_id" value="{{$data->id}}" id="">
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Pegawai</label>
                        <select name="pegawai_id" id="pegawai_id" class="form-control">
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach ($pegawai as $d)
                            <option value="{{$d->id}}">{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $("#tambah").click(function(){
            $('#status').text('Tambah Data');
            $('#exampleModalForms').modal('show');
        });
</script>
@endsection