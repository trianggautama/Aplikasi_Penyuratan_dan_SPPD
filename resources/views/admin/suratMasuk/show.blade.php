@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Detail Surat Masuk</h2>
            </div>
            <div class="d-flex">
				<a href="{{Route('suratMasukIndex')}}" class="btn btn-sm btn-dark btn-wth-icon icon-wthot-bg mb-15" id="tambah"><span class="icon-label"><i class="fa fa-arrow-left" ></i> </span><span class="btn-text">Kembali</span></a>
			</div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Detail Surat Masuk</h5>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                      <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <h6 for="exampleDropdownFormEmail1"><b>Nomor Agenda</b></h6>
                                                <p>{{$data->agenda->no_agenda}}</p>
                                            </div>
                                            <div class="form-group">
                                                <h6 for="exampleDropdownFormEmail1"><b>Nomor Surat</b></h6>
                                                <p>{{$data->nomor_surat}}</p>
                                            </div>
                                            <div class="form-group">
                                                <h6 for="exampleDropdownFormEmail1"><b>Jenis Surat</b></h6>
                                                <p>{{$data->jenis_surat->jenis_surat}}</p>
                                            </div>
                                            <div class="form-group">
                                                <h6 for="exampleDropdownFormEmail1"><b>Tanggal Surat</b></h6>
                                                <p>{{$data->tanggal_surat}}</p>
                                            </div>
                                            <div class="form-group">
                                                <h6 for="exampleDropdownFormEmail1"><b>Tanggal Terima</b></h6>
                                                <p>{{$data->tanggal_terima}}</p>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <h6 for="exampleDropdownFormEmail1"><b>Asal Surat</b></h6>
                                                <p>{{$data->asal_surat}}</p>
                                            </div>
                                            <div class="form-group">
                                                <h6 for="exampleDropdownFormEmail1"><b>Isi Ringkas</b></h6>
                                                <p class="text-justify">{{$data->isi}}</p>
                                            </div>
                                            <div class="form-group">
                                                <h6 for="exampleDropdownFormEmail1"><b>lampiran File</b></h6> <br>
                                                <a href="{{asset('suratMasuk/'.$data->file)}}" class="btn btn-default" target="_blank"><i class="fa fa-file"></i></a>
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