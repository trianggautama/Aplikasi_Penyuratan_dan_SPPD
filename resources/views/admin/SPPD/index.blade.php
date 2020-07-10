@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Halaman SPPD</h2>
            </div>
            <div class="d-flex">
                <a href="{{Route('SPPDFilterTujuan')}}"
                    class="btn btn-sm btn-outline-light btn-wth-icon icon-wthot-bg mr-15 mb-15"><span
                        class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Filter Tujuan
                    </span></a>
                <a href="{{Route('SPPDFilterWaktu')}}"
                    class="btn btn-sm btn-outline-light btn-wth-icon icon-wthot-bg mr-15 mb-15"><span
                        class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Filter Waktu
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
                                                    <th>Tujuan</th>
                                                    <th>Transportasi</th>
                                                    <th>Tanggal Berangkat</th>
                                                    <th>Tanggal Kepulangan</th>
                                                    <th>Maksud Tujuan</th>
                                                    <th>Jumlah Orang</th>
                                                    <th>Jumlah Biaya</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->kategori->kota->nama_kota}}</td>
                                                    <td>{{$d->kategori->transportasi->nama_transportasi}}</td>
                                                    <td>{{carbon\carbon::parse($d->tanggal_berangkat)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td>{{carbon\carbon::parse($d->tanggal_kembali)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td>{{$d->maksud_tujuan}}</td>
                                                    <td>{{$d->jumlah_orang}} Orang</td>
                                                    <td>@currency($d->jumlah),-</td>
                                                    <td>
                                                        <a href="{{Route('SPPDShow',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-info m-1"><span class="icon-label"><i
                                                                    class="fa fa-info-circle"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                        <a href="{{Route('SPPDEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-primary  m-1"><span
                                                                class="icon-label"><i class="fa fa-edit"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                        <button class="btn btn-sm btn-danger m-1" onclick="Hapus('')">
                                                            <i class="fa fa-trash"></i></button>
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
                <form action="{{Route('SPPDCreate')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Nomor Surat Tugas</label>
                                <input type="text" name="no_surat_tugas" class="form-control"required >
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Nomor Nota Dinas</label>
                                <input type="text" name="no_nota_dinas" class="form-control"required >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                            <label for="exampleDropdownFormEmail1">Berangkat Dari</label>
                            <select name="kategori_id" id="kategori_id" class="form-control"required >
                                <option value="">-- Pilih Kota --</option>
                                @foreach ($kota as $d)
                                <option value="{{$d->id}}">{{$d->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Tujuan</label>
                                <select name="kategori_id" id="kategori_id" class="form-control"required >
                                    <option value="">-- Pilih Kota --</option>
                                    @foreach ($kota as $d)
                                    <option value="{{$d->id}}">{{$d->nama_kota}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Transportasi</label>
                                <select name="kategori_id" id="kategori_id" class="form-control"required >
                                    <option value="">-- Pilih Transportasi --</option>
                                    @foreach ($transportasi as $d)
                                    <option value="{{$d->id}}">{{$d->nama_transportasi}}</option>
                                    @endforeach
                                </select>
                            </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Nama Tempat</label>
                        <input type="text" name="tempat" class="form-control"required >
                    </div>
                    <div class="row">
                        <div class="col-md">
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail1">Tanggal Berangkat</label>
                            <input type="date" name="tanggal_berangkat" class="form-control" required>
                        </div>
                        </div>
                        <div class="col-md">
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail1">Tanggal kepulangan</label>
                            <input type="date" name="tanggal_kepulangan" class="form-control" required>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Maksud Tujuan</label>
                        <textarea name="" id="" class="form-control"></textarea>
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