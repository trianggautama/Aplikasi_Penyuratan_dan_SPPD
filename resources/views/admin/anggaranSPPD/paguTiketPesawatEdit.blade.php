@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Pagu Tiket pesawat Pejalanan Dinas Edit</h2>
            </div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Data Table</h5>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <form method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Kode Biaya</label>
                                                <input type="text" name="kode_biaya" class="form-control" required>
                                            </div>
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Tujuan</label>
                                                        <select name="uraian" id="uraian" class="form-control">
                                                            <option value="Pagu Tiket Pesawat">Pilih tujuan</option>
                                                            @foreach($kota as $k)
                                                            <option value="{{$k->id}}">{{$k->nama_kota}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">uraian</label>
                                                <select name="uraian" id="uraian" class="form-control">
                                                    <option value="Pagu Tiket Pesawat">Pagu Tiket Pesawat SPPD</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Kelas</label>
                                                <select name="uraian" id="uraian" class="form-control">
                                                    <option value="Ekonomi">Ekonomi</option>
                                                    <option value="bisnis">bisnis</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Total besaran Pagu / hari</label>
                                                <input type="text" name="besar_pagu" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Kelas</label>
                                                <select name="jenis_sppd" id="jenis_sppd" class="form-control" required>
                                                    <option value="">-- Pilih Kelas --</option>
                                                    <option value="Ekonomi">Ekonomi</option>
                                                    <option value="Bisnis">Bisnis</option>
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