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
                                                <label for="exampleDropdownFormEmail1">Kode Biaya</label>
                                                <input type="text" name="besar_pagu" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">uraian</label>
                                                <textarea name="uraian" id="" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Pilih Golongan</label>
                                                <select name="kota_id" id="kota_id" class="form-control" required>
                                                    <option value="">-- Pilih Golongan --</option>
                                                    @foreach ($golongan as $d)
                                                    <option value="{{$d->id}}">{{$d->kode_golongan}} - {{$d->golongan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Total besaran Pagu / hari</label>
                                                <input type="text" name="besar_pagu" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Jenis SPPD</label>
                                                <select name="jenis_sppd" id="jenis_sppd" class="form-control" required>
                                                    <option value="">-- Pilih Jenis SPPD --</option>
                                                    <option value="1">Dalam Derah</option>
                                                    <option value="1">Luar Derah</option>
                                                </select>
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