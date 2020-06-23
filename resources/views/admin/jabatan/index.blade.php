@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Halaman Jabatan</h2>
            </div>
            <div class="d-flex">
                <button class="btn btn-sm btn-outline-light btn-wth-icon icon-wthot-bg mr-15 mb-15"><span
                        class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Print
                    </span></button>
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
                                                    <th>Kode jabatan</th>
                                                    <th>Nama jabatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->kode_jabatan}}</td>
                                                    <td>{{$d->jabatan}}</td>
                                                    <td>
                                                        <!-- <button class="btn btn-sm btn-outline-light  "><span class="icon-label"><i class="fa fa-eye"></i> </span><span class="btn-text"> </span></button> -->
                                                        <a href="{{Route('jabatanEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-info  "><span
                                                                class="icon-label"><i class="fa fa-edit"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                        <!-- <a href="{{Route('jabatanDestroy',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-outline-light  "><span
                                                                class="icon-label"><i class="fa fa-trash"></i>
                                                            </span><span class="btn-text"> </span></a> -->
                                                            <button class="btn btn-sm btn-danger" onclick="Hapus('{{$d->uuid}}','{{$d->jabatan}}')"> <i class="fa fa-trash"></i></button>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="status">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('jabatanCreate')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Kode jabatan</label>
                        <input type="text" name="kode_jabatan" class="form-control" id="kode_jabatan"
                            placeholder="kode_jabatan" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Nama jabatan</label>
                        <input type="text" name="jabatan" class="form-control" id="nama_jabatan"
                            placeholder="nama_jabatan" required>
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
    
        function Hapus(uuid, jabatan) {
			Swal.fire({
			title: 'Anda Yakin?',
			text: " Menghapus Data Jabatan" + jabatan ,        
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				url = '{{route("jabatanDestroy",'')}}';
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }
</script>
@endsection