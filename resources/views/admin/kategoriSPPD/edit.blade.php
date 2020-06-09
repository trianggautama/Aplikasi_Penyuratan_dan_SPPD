@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Kategori SPPD Edit</h2>
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
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Pilih Tujuan</label>
                                                <select name="kota_id" id="kota_id" class="form-control">
                                                    <option value="">-- Pilih tujuan --</option>
                                                    @foreach ($kota as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->kota_id ? 'selected' : ''}}>{{$d->nama_kota}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Transport</label>
                                                <select name="transportasi_id" id="transportasi_id"
                                                    class="form-control">
                                                    <option value="">--Pilih jenis transportasi --</option>
                                                    @foreach ($transportasi as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->transportasi_id ? 'selected' : ''}}>
                                                        {{$d->nama_transportasi}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">besaran Pagu / hari</label>
                                                <input type="text" value="{{$data->besar_pagu}}" name="besar_pagu"
                                                    class="form-control">
                                            </div>
                                            <hr>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i>
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