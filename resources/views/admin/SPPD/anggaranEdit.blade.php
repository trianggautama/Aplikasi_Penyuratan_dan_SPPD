@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10"> Anggaran Riil Edit</h2>
            </div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Edit Data</h5>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <form method="Post">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">pagu Harian</label>
                                                <select name="harian_id" id="harian_id" class="form-control">
                                                    <option value="">-- pilih pagu harian --</option>
                                                    @foreach($harian as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->harian_id ? 'selected' : ''}}>
                                                        {{$d->kode_biaya}} -
                                                        {{$d->kategori}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Pagu Representasi</label>
                                                <select name="representasi_id" id="representasi_id"
                                                    class="form-control">
                                                    <option value="">-- pilih pagu Representasi --</option>
                                                    @foreach($representasi as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->representasi_id ? 'selected' : ''}}>
                                                        {{$d->kategori}} -
                                                        {{$d->golongan->kode_golongan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">pagu Penginapan</label>
                                                <select name="penginapan_id" id="penginapan_id" class="form-control">
                                                    <option value="">-- pilih pagu penginapan --</option>
                                                    @foreach($penginapan as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->penginapan_id ? 'selected' : ''}}>
                                                        {{$d->kategori}} -
                                                        {{$d->golongan->kode_golongan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">pagu tiket Pesawat</label>
                                                <select name="tiket_id" id="tiket_id" class="form-control">
                                                    <option value="">-- pilih pagu tiket pesawat --</option>
                                                    @foreach($tiket as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->tiket_id ? 'selected' : ''}}>
                                                        {{$d->kode_biaya}} -
                                                        {{$d->kategori}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">pagu Taksi</label>
                                                <select name="taksi_id" id="taksi_id" class="form-control">
                                                    <option value="">-- pilih pagu Taksi --</option>
                                                    @foreach($taksi as $d)
                                                    <option value="{{$d->id}}"
                                                        {{$d->id == $data->taksi_id ? 'selected' : ''}}>
                                                        {{$d->kode_biaya}} -
                                                        {{$d->kategori}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Catatan</label>
                                                <textarea name="catatan" id=""
                                                    class="form-control">{{$data->catatan}}</textarea>
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