@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10"> SPPD Edit</h2>
            </div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Edit Data</h5>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <form method="Post">
                                            @method('PUT')
                                            @csrf
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Nomor Surat Tugas</label>
                                                        <input type="text" value="{{$data->no_surat_tugas}}"
                                                            name="no_surat_tugas" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Nomor Nota Dinas</label>
                                                        <input type="text" value="{{$data->no_nota_dinas}}"
                                                            name="no_nota_dinas" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Berangkat Dari</label>
                                                        <select name="berangkat_id" id="berangkat_id"
                                                            class="form-control" required>
                                                            <option value="">-- Pilih Kota --</option>
                                                            @foreach ($kota as $d)
                                                            <option value="{{$d->id}}"
                                                                {{$data->berangkat_id == $d->id ? 'selected' : ''}}>
                                                                {{$d->nama_kota}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Tujuan</label>
                                                        <select name="tujuan_id" id="tujuan_id" class="form-control"
                                                            required>
                                                            <option value="">-- Pilih Kota --</option>
                                                            @foreach ($kota as $d)
                                                            <option value="{{$d->id}}"
                                                                {{$data->tujuan_id == $d->id ? 'selected' : ''}}>
                                                                {{$d->nama_kota}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Transportasi</label>
                                                <select name="transportasi_id" id="transportasi_id" class="form-control"
                                                    required>
                                                    <option value="">-- Pilih Transportasi --</option>
                                                    @foreach ($transportasi as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$data->transportasi_id == $d->id ? 'selected' : ''}}>
                                                        {{$d->nama_transportasi}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Nama Tempat</label>
                                                <input type="text" value="{{$data->tempat}}" name="tempat"
                                                    class="form-control" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Tanggal Berangkat</label>
                                                        <input type="date" value="{{$data->tanggal_berangkat}}"
                                                            name="tanggal_berangkat" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Tanggal
                                                            kepulangan</label>
                                                        <input type="date" value="{{$data->tanggal_kepulangan}}"
                                                            name="tanggal_kepulangan" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Maksud Tujuan</label>
                                                <textarea name="maksud_tujuan" id=""
                                                    class="form-control">{{$data->maksud_tujuan}}</textarea>
                                            </div>
                                            <hr>
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