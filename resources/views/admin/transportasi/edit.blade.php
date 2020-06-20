@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Transportasi Edit</h2>
            </div>
            <div class="d-flex">
                <a href="{{Route('transportasiIndex')}}" class="btn btn-sm btn-dark btn-wth-icon icon-wthot-bg mb-15"
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
                                                <label for="exampleDropdownFormEmail1">Jenis Transportasi</label>
                                                <select name="jenis_transportasi" id="jenis_transportasi"
                                                    class="form-control">
                                                    <option value="">-- Pilih Jenis Transportasi --</option>
                                                    <option value="1"
                                                        {{$data->jenis_transportasi == 1 ? 'selected' : ''}}>Darat
                                                    </option>
                                                    <option value="2"
                                                        {{$data->jenis_transportasi == 2 ? 'selected' : ''}}>Laut
                                                    </option>
                                                    <option value="3"
                                                        {{$data->jenis_transportasi == 3 ? 'selected' : ''}}>Udara
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Nama Transportasi</label>
                                                <input type="text" class="form-control" id="nama_transportasi"
                                                    name="nama_transportasi" value="{{$data->nama_transportasi}}"
                                                    placeholder="Nama Transportasi">
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