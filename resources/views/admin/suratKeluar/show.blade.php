@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Detail Surat Keluar</h2>
            </div>
            <div class="d-flex">
				<a href="{{Route('suratKeluarIndex')}}" class="btn btn-sm btn-dark btn-wth-icon icon-wthot-bg mb-15" id="tambah"><span class="icon-label"><i class="fa fa-arrow-left" ></i> </span><span class="btn-text">Kembali</span></a>
			</div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Detail Surat Keluar</h5>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                      <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Nomor Agenda</b></label>
                                                <p>{{$data->agenda->no_agenda}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Nomor Surat</b></label>
                                                <p>{{$data->nomor_surat}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Tanggal Kirim</b></label>
                                                <p>{{$data->tanggal_kirim}}</p>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Tujuan Surat</b></label>
                                                <p>{{$data->tujuan}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Isi Ringkas</b></label>
                                                <p class="text-justify">{{$data->isi}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>lampiran File</b></label> <br>
                                                <a href="{{asset('suratKeluar/'.$data->file)}}" class="btn btn-default" target="_blank"><i class="fa fa-file"></i></a>
                                            </div>
                                          </div>
                                      </div>
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
   
</script>
@endsection