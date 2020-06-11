@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Disposisi Surat</h2>
            </div>
            <div class="d-flex">
                <a href="{{Route('suratDisposisiFilter')}}" class="btn btn-sm btn-outline-light btn-wth-icon icon-wthot-bg mr-15 mb-15"><span
                        class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Print
                    </span></a>
                <button class="btn btn-sm btn-success btn-wth-icon icon-wthot-bg mb-15" id="tambah"><span
                        class="icon-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Tambah Data
                    </span></button>
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
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nomor Surat</th>
                                                    <th>Jenis Surat</th>
                                                    <th>Tujuan Disposisi</th>
                                                    <th>Isi Disposisi</th>
                                                    <th>Sifat</th>
                                                    <th>Batas Waktu</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->surat_masuk->nomor_surat}}</td>
                                                    <td>{{$d->surat_masuk->jenis_surat->jenis_surat}}</td>
                                                    <td>{{$d->pegawai->nama}}</td>
                                                    <td>{{$d->isi}}</td>
                                                    <td>{{$d->sifat}}</td>
                                                    <td>{{carbon\carbon::parse($d->batas_waktu)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td>
                                                        <a href="{{Route('suratDisposisiShow',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-info  "><span
                                                                class="icon-label"><i class="fa fa-eye"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                        <a href="{{Route('suratDisposisiEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-primary  "><span
                                                                class="icon-label"><i class="fa fa-edit"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                            <button class="btn btn-sm btn-danger" onclick="Hapus('{{$d->uuid}}','{{$d->surat_masuk->nomor_surat}}')"> <i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nomor Surat</th>
                                                    <th>Jenis Surat</th>
                                                    <th>Tujuan Disposisi</th>
                                                    <th>Isi Disposisi</th>
                                                    <th>Sifat</th>
                                                    <th>Batas Waktu</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                        </table>
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

<!-- Modal forms-->
<div class="modal fade" id="exampleModalForms" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="status">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('suratDisposisiCreate')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Nomor Surat</label>
                        <select name="surat_masuk_id" id="surat_masuk_id" class="form-control">
                            <option value="">-- Pilih dari surat Masuk --</option>
                            @foreach ($surat_masuk as $d)
                            <option value="{{$d->id}}">{{$d->nomor_surat}} - {{$d->asal_surat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Tujuan Disposisi</label>
                        <select name="pegawai_id" id="pegawai_id" class="form-control">
                            <option value="">-- Pilih dari pegawai --</option>
                            @foreach ($pegawai as $d)
                            <option value="{{$d->id}}">{{$d->jabatan->jabatan}} - {{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Isi Disposisi</label>
                        <input type="text" class="form-control" name="isi" placeholder="Isi disposisi">
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Sifat</label>
                        <select name="sifat" id="sifat" class="form-control">
                            <option value="">-- pilih sifat --</option>
                            <option value="Biasa">Biasa</option>
                            <option value="Mendesak">Mendesak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Batas Waktu</label>
                        <input type="date" class="form-control" name="batas_waktu">
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Catatan</label>
                        <textarea name="catatan" id="catatan" class="form-control"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $("#tambah").click(function(){
            $('#status').text('Tambah Data');
            $('#exampleModalForms').modal('show');
        });

        function Hapus(uuid, nomor) {
			Swal.fire({
			title: 'Anda Yakin?',
			text: " Menghapus Data Disposisi Surat Masuk nomor '" + nomor ,        
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				url = '{{route("suratDisposisiDestroy",'')}}';
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }
</script>
@endsection