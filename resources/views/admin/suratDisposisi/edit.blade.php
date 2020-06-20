@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Disposisi Surat Edit</h2>
            </div>
            <div class="d-flex">
                <a href="{{Route('suratDisposisiIndex')}}" class="btn btn-sm btn-dark btn-wth-icon icon-wthot-bg mb-15"
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
                                                <label for="exampleDropdownFormEmail1">Nomor Surat</label>
                                                <select name="surat_masuk_id" id="surat_masuk_id" class="form-control">
                                                    <option value="">-- Pilih dari surat Masuk --</option>
                                                    @foreach ($surat_masuk as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->surat_masuk_id ? 'selected' : ''}}>
                                                        {{$d->nomor_surat}} - {{$d->asal_surat}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Tujuan Disposisi</label>
                                                <select name="pegawai_id" id="pegawai_id" class="form-control">
                                                    <option value="">-- Pilih dari pegawai --</option>
                                                    @foreach ($pegawai as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->pegawai_id ? 'selected' : ''}}>
                                                        {{$d->NIP}} - {{$d->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Isi Disposisi</label>
                                                <input type="text" class="form-control" value="{{$data->isi}}"
                                                    name="isi" placeholder="Isi disposisi">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Sifat</label>
                                                <select name="sifat" id="sifat" class="form-control">
                                                    <option value="">-- pilih sifat --</option>
                                                    <option value="Biasa" {{$data->sifat == 'Biasa' ? 'selected' : ''}}>Biasa</option>
                                                    <option value="Mendesak" {{$data->sifat == 'Mendesak' ? 'selected' : ''}}>Mendesak</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Batas Waktu</label>
                                                <input type="date" class="form-control" value="{{$data->batas_waktu}}"
                                                    name="batas_waktu">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Catatan</label>
                                                <textarea name="catatan" id="catatan"
                                                    class="form-control">{{$data->catatan}}</textarea>
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