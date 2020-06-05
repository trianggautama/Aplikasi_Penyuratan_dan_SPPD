@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Register SK Edit</h2>
            </div>
            <div class="d-flex">
                <a href="{{Route('skIndex')}}" class="btn btn-sm btn-dark btn-wth-icon icon-wthot-bg mb-15"
                    id="tambah"><span class="icon-label"><i class="fa fa-arrow-left"></i> </span><span
                        class="btn-text">Kembali</span></a>
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
                                                <label for="exampleDropdownFormEmail1">Tanggal Register</label>
                                                <input type="date" class="form-control"
                                                    value="{{$data->tanggal_register}}" name="tanggal_register">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Nomor Register</label>
                                                <input type="text" class="form-control"
                                                    value="{{$data->nomor_register}}" name="nomor_register"
                                                    placeholder="Nomor Register">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Jenis permohonan</label>
                                                <select name="jenis_surat_id" id="jenis_surat_id" class="form-control">
                                                    <option value="">-- Pilih dari jenis surat --</option>
                                                    @foreach($jenis_surat as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->jenis_surat_id ? 'selected' : ''}}>
                                                        {{$d->jenis_surat}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Pemohon</label>
                                                <input type="text" class="form-control" value="{{$data->pemohon}}"
                                                    name="pemohon">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Identitas</label>
                                                <textarea name="identitas" id="identitas"
                                                    class="form-control">{{$data->identitas}}</textarea>
                                            </div>
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