@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Nomor Agenda Edit</h2>
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
                                                <label for="exampleDropdownFormEmail1">Kode Surat</label>
                                                <select name="kode_surat" id="kode_surat" class="form-control">
                                                    <option value="Surat Keputusan (SKep)"
                                                        {{$data->kode_surat == 'Surat Keputusan (SKep)' ? 'selected' : ''}}>
                                                        Surat Keputusan (SKep)
                                                    </option>
                                                    <option value="Surat Keterangan (SKet)"
                                                        {{$data->kode_surat == 'Surat Keterangan (SKet)' ? 'selected' : ''}}>
                                                        Surat Keterangan (SKet)
                                                    </option>
                                                    <option value="Surat Edaran (SEd)"
                                                        {{$data->kode_surat == 'Surat Edaran (SEd)' ? 'selected' : ''}}>
                                                        Surat Edaran (SEd)</option>
                                                    <option value="Surat Tugas (ST)"
                                                        {{$data->kode_surat == 'Surat Tugas (ST)' ? 'selected' : ''}}>
                                                        Surat Tugas (ST)</option>
                                                    <option value="Surat Peringatan (SP)"
                                                        {{$data->kode_surat == 'Surat Peringatan (SP)' ? 'selected' : ''}}>
                                                        Surat Peringatan (SP)</option>
                                                    <option value="Surat Izin kegiatan (SIK)"
                                                        {{$data->kode_surat == 'Surat Izin kegiatan (SIK)' ? 'selected' : ''}}>
                                                        Surat Izin kegiatan (SIK)
                                                    </option>
                                                    <option value="Surat Perjanjian (SPn)"
                                                        {{$data->kode_surat == 'Surat Perjanjian (SPn)' ? 'selected' : ''}}>
                                                        Surat Perjanjian (SPn)
                                                    </option>
                                                    <option value="Surat Undangan (Und)"
                                                        {{$data->kode_surat == 'Surat Undangan (Und)' ? 'selected' : ''}}>
                                                        Surat Undangan (Und)</option>
                                                    <option value="Nota Dinas (Nd)"
                                                        {{$data->kode_surat == 'Nota Dinas (Nd)' ? 'selected' : ''}}>
                                                        Nota Dinas (Nd)</option>
                                                    <option value="Surat Pengumuman (Peng)"
                                                        {{$data->kode_surat == 'Surat Pengumuman (Peng)' ? 'selected' : ''}}>
                                                        Surat Pengumuman (Peng)
                                                    </option>
                                                    <option value="Surat Ketetapan (sTap)"
                                                        {{$data->kode_surat == 'Surat Ketetapan (sTap)' ? 'selected' : ''}}>
                                                        Surat Ketetapan (sTap)
                                                    </option>
                                                    <option value="Surat Perintah (SPer)"
                                                        {{$data->kode_surat == 'Surat Perintah (SPer)' ? 'selected' : ''}}>
                                                        Surat Perintah (SPer)</option>
                                                    <option value="Surat Lain - lain (L)"
                                                        {{$data->kode_surat == 'Surat Lain - lain (L)' ? 'selected' : ''}}>
                                                        Surat Lain - lain (L)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">Nomor Agenda</label>
                                                <input type="text" name="no_agenda" value="{{$data->no_agenda}}"
                                                    class="form-control" id="no_agenda" placeholder="no_agenda">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleDropdownFormEmail1">keterangan</label>
                                                <input type="text" name="keterangan" value="{{$data->keterangan}}"
                                                    class="form-control" id="keterangan" placeholder="keterangan">
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