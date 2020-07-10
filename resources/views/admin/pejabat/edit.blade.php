@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Pejabat Penandatanganan Edit</h2>
            </div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Form Edit</h5>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <form method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Penandatanganan SPPD</label>
                                                <select name="sppd_id" id="sppd_id" class="form-control">
                                                    <option value="">-- Pilih Pegawai --</option>
                                                    @foreach ($pegawai as $d)
                                                    <option value="{{$d->id}}">{{$d->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Penandatangan ST</label>
                                                <select name="st_id" id="st_id" class="form-control">
                                                    <option value="">-- Pilih Pegawai --</option>
                                                    @foreach ($pegawai as $d)
                                                    <option value="{{$d->id}}">{{$d->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Penandatanganan NT</label>
                                                <select name="nt_id" id="nt_id" class="form-control">
                                                    <option value="">-- Pilih Pegawai --</option>
                                                    @foreach ($pegawai as $d)
                                                    <option value="{{$d->id}}">{{$d->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Penandatanganan Pengguna Anggaran</label>
                                                <select name="anggaran_id" id="anggaran_id" class="form-control">
                                                    <option value="">-- Pilih Pegawai --</option>
                                                    @foreach ($pegawai as $d)
                                                    <option value="{{$d->id}}">{{$d->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Penandatanganan Bendahara</label>
                                                <select name="bendahara_id" id="bendahara_id" class="form-control">
                                                    <option value="">-- Pilih Pegawai --</option>
                                                    @foreach ($pegawai as $d)
                                                    <option value="{{$d->id}}">{{$d->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                                    Ubah Data</button>
                                            </div>
                                        </form>
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
    $("#tambah").click(function(){
            $('#status').text('Tambah Data');
            $('#exampleModalForms').modal('show');
        });
</script>
@endsection