@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Surat Keluar Edit</h2>
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
                            <h5 class="hk-sec-title">Form Edit</h5>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <form method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Nomor Agenda</label>
                                                <select name="no_agenda_id" id="no_agenda_id" class="form-control">
                                                    <option value="">-- Pilih Nomor Agenda --</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Nomor Surat</label>
                                                <input type="text" class="form-control" id="nomor_surat" placeholder="Nomor Surat">
                                            </div>                            
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Jenis Surat</label>
                                                <select name="no_agenda_id" id="no_agenda_id" class="form-control">
                                                    <option value="">-- Pilih Jenis Surat --</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Tanggal Kirim</label>
                                                <input type="date" class="form-control" id="tanggal_kirim" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Tujuan</label>
                                                <input type="text" class="form-control" id="tujuan" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Isi Ringkas</label>
                                                <textarea name="isi_ringkas" id="isi_ringkas" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">File</label>
                                                <input type="file" class="form-control" id="asal_surat" >
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