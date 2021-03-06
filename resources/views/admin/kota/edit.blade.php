@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Kota Edit</h2>
            </div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Edit Form</h5>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <form method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Nama Kota</label>
                                                <input type="text" name="nama_kota" class="form-control" id="nama_kota"
                                                    value="{{$data->nama_kota}}" placeholder="nama_kota">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Zona</label>
                                                <select name="zona" id="zona" class="form-control">
                                                    <option value="">-- Pilih Zona --</option>
                                                    <option value="1" {{$data->zona == 1 ? 'selected' : ''}}> Luar
                                                        Kecamatan Dalam Daerah </option>
                                                    <option value="2" {{$data->zona == 2 ? 'selected' : ''}}> Luar Kota
                                                        Dalam Provinsi </option>
                                                    <option value="3" {{$data->zona == 1 ? 'selected' : ''}}> Luar Kota
                                                        luar Provinsi </option>
                                                </select>
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