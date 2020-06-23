@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Surat Masuk</h2>
            </div>
            <div class="d-flex">
                <a href="{{Route('suratMasukFilter')}}" class="btn btn-sm btn-outline-light btn-wth-icon icon-wthot-bg mr-15 mb-15"><span
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
                                                    <th>Nomor Agenda</th>
                                                    <th>Nomor Surat</th>
                                                    <th>Tanggal Surat</th>
                                                    <th>tanggal Terima</th>
                                                    <th>Asal Surat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->agenda->no_agenda}}</td>
                                                    <td>{{$d->nomor_surat}}</td>
                                                    <td>{{carbon\carbon::parse($d->tanggal_surat)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td>{{carbon\carbon::parse($d->tanggal_terima)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td>{{$d->asal_surat}}</td>
                                                    <td>
                                                        <a href="{{Route('suratMasukShow',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-info  "><span
                                                                class="icon-label"><i class="fa fa-eye"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                        <a href="{{Route('suratMasukEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-primary  "><span
                                                                class="icon-label"><i class="fa fa-edit"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                            <button class="btn btn-sm btn-danger" onclick="Hapus('{{$d->uuid}}','{{$d->nomor_surat}}')"> <i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
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
                <form action="{{Route('suratMasukCreate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Nomor Agenda</label>
                        <select name="agenda_id" id="agenda_id" class="form-control" required>
                            <option value="">-- Pilih Nomor Agenda --</option>
                            @foreach($agenda as $d)
                            <option value="{{$d->id}}">{{$d->no_agenda}} - {{$d->keterangan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Nomor Surat</label>
                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat"
                            placeholder="Nomor Surat" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Tanggal Surat</label>
                                <input type="date" class="form-control" name="tanggal_surat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Tanggal Terima</label>
                                <input type="date" class="form-control" name="tanggal_terima">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Asal Surat</label>
                        <input type="text" class="form-control" name="asal_surat">
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Isi Ringkas</label>
                        <textarea name="isi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">File</label>
                        <input type="file" class="form-control" name="file">
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
			text: " Menghapus Data Surat Masuk nomor '" + nomor ,        
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				url = '{{route("suratMasukDestroy",'')}}';
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }
</script>
@endsection