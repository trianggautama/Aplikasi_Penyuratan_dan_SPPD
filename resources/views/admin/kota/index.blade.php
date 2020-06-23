@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Halaman Kota</h2>
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
                                                    <th>Nama Kota</th>
                                                    <th>Zona</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->nama_kota}}</td>
                                                    <td>@if($d->zona == 1)
                                                        Luar Kecamatan Dalam Daerah
                                                        @elseif($d->zona == 2)
                                                        Luar Kota Dalam Provinsi
                                                        @else
                                                        Luar Kota luar Provinsi
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!-- <button class="btn btn-sm btn-outline-light  "><span class="icon-label"><i class="fa fa-eye"></i> </span><span class="btn-text"> </span></button> -->
                                                        <a href="{{Route('kotaEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-primary  "><span
                                                                class="icon-label"><i class="fa fa-edit"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                            <button class="btn btn-sm btn-danger" onclick="Hapus('{{$d->uuid}}','{{$d->nama_kota}}')"> <i class="fa fa-trash"></i></button>
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
                <form action="{{Route('kotaCreate')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Nama Kota</label>
                        <input type="text" name="nama_kota" class="form-control" id="nama_kota" placeholder="nama_kota" required >
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Zona</label>
                        <select name="zona" id="zona" class="form-control" required >
                            <option value="">-- Pilih Zona --</option>
                            <option value="1"> Luar Kecamatan Dalam Daerah </option>
                            <option value="2"> Luar Kota Dalam Provinsi </option>
                            <option value="3"> Luar Kota luar Provinsi </option>
                        </select>
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

        function Hapus(uuid, nama_kota) {
			Swal.fire({
			title: 'Anda Yakin?',
			text: " Menghapus Data Kota '" + nama_kota ,        
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				url = '{{route("kotaDestroy",'')}}';
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }
</script>
@endsection