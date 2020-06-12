@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Pegawai Edit</h2>
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
                                                <label for="exampleDropdownFormEmail1">Nama</label>
                                                <input type="text" name="nama" class="form-control" id="nama"
                                                    value="{{$data->nama}}" placeholder="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">NIP</label>
                                                <input type="text" name="NIP" class="form-control" id="nip"
                                                    value="{{$data->NIP}}" placeholder="nip">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Tempat lahir</label>
                                                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="tempat_lahir">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Tanggal lahir</label>
                                                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="tanggal_lahir">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">golongan</label>
                                                <select name="golongan_id" class="form-control">
                                                    <option value="">-- Pilih golongan --</option>
                                                    @foreach($golongan as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$data->golongan_id == $d->id ? 'selected' : ''}}>
                                                        {{$d->golongan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">jabatan</label>
                                                <select name="jabatan_id" class="form-control">
                                                    <option value="">-- Pilih jabatan --</option>
                                                    @foreach($jabatan as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$data->jabatan_id == $d->id ? 'selected' : ''}}>
                                                        {{$d->jabatan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Unit Kerja</label>
                                                <select name="unit_kerja_id" class="form-control">
                                                    <option value="">-- Pilih Unit Kerja --</option>
                                                    @foreach($unit_kerja as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$data->unit_kerja_id == $d->id ? 'selected' : ''}}>
                                                        {{$d->unit}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormPassword1">Bidang</label>
                                                <input type="text" name="bidang" class="form-control" id="bidang"
                                                    nama="bidang" value="{{$data->bidang}}" placeholder="Bidang">
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