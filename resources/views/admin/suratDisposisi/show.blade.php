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
                                                <label for="exampleDropdownFormEmail1"><b>Nomor Surat</b></label>
                                                <p>Nomor Surat</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Asal Surat</b></label>
                                                <p>Asal Surat</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Isi Ringkas</b></label>
                                                <p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet odit eum odio aut ipsa illo sapiente incidunt neque, suscipit temporibus nobis hic totam sed. Aliquam debitis doloremque odit enim iusto? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis qui, vel officiis voluptatem sint quis quisquam at, dicta accusantium facilis delectus repudiandae? Hic non debitis maiores placeat quis. Dolorum, deleniti.</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>lampiran File</b></label> <br>
                                                <a href="" class="btn btn-default"><i class="fa fa-file"></i></a>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Tujuan Disposisi</b></label>
                                                <p>Tujuan Surat</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Isi Disposisi</b></label>
                                                <p>Isi Surat</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Sifat</b></label>
                                                <p>Sifat</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Batas Waktu</b></label>
                                                <p>Batas Waktu</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1"><b>Catatan</b></label>
                                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo aspernatur voluptates iusto tempora numquam consequatur, illum beatae rem ab voluptas modi dolore dolor tenetur fugit molestias debitis deleniti quibusdam fugiat?</p>
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