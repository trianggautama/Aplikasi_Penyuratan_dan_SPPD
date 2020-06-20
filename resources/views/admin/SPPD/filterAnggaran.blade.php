@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Cetak SPPD Anggaran</h2>
            </div>
            <div class="d-flex">
            </div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Rentang Waktu</h5>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <form action="" method="POST" enctype="multipart/form-data" target="_blank">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Tanggal Mulai</label>
                                                        <input type="date" class="form-control"  name="tanggal_mulai">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Tanggal Akhir</label>
                                                        <input type="date" class="form-control"  name="tanggal_akhir">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                            <a href="{{Route('SPPDIndex')}}" class="btn btn-default"id="tambah"><span class="icon-label"><i class="fa fa-arrow-left"></i> </span><span class="btn-text">Kembali</span></a>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-print"></i>
                                                    Cetak Data</button>
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