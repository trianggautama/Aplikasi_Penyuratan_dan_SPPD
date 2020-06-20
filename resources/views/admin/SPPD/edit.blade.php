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
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Tujuan</label>
                                                <select name="kategori_id" id="kategori_id" class="form-control">
                                                    <option value="">-- Pilih kategori SPPD --</option>
                                                    @foreach ($kategori as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->kategori_id ? 'selected' : ''}}>
                                                        {{$d->kota->nama_kota}}</option>
                                                    @endforeach
                                                </select>
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Tanggal Berangkat</label>
                                                <input type="date" name="tanggal_berangkat"
                                                    value="{{$data->tanggal_berangkat}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Tanggal kepulangan</label>
                                                <input type="date" name="tanggal_kepulangan"
                                                    value="{{$data->tanggal_kepulangan}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Maksud Tujuan</label>
                                                <input type="text" name="maksud_tujuan" value="{{$data->maksud_tujuan}}"
                                                    class="form-control">
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