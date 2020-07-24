@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Surat Pembatalan SPPD Edit</h2>
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
                                                <label for="exampleDropdownFormEmail1">Nomor Surat Pembatalan
                                                    SPPD</label>
                                                <input type="text" name="no_surat" value="{{$data->no_surat}}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">SPPD</label>
                                                <select name="sppd_id" id="sppd_id" class="form-control" required>
                                                    <option value="">-- Pilih SPPD --</option>
                                                    @foreach ($sppd as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->sppd_id ? 'selected' : ''}}>Nomor SPT
                                                        :{{$d->no_surat_tugas}} ,-
                                                        {{$d->tujuan->nama_kota}},
                                                        {{carbon\carbon::parse($d->tanggal_berangkat)->translatedFormat('d F Y')}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Pejabat Pembuat Keputusan</label>
                                                <select name="pegawai_id" id="pegawai_id" class="form-control" required>
                                                    <option value="">-- Pilih Pegawai --</option>
                                                    @foreach ($pegawai as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->pegawai_id ? 'selected' : ''}}>{{$d->nama}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Alasan Pembatalan</label>
                                                <textarea name="alasan" id="alasan" rows="10"
                                                    class="tinymce">{{$data->alasan}}</textarea>
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