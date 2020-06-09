@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Halaman Kategori SPPD</h2>
            </div>
            <div class="d-flex">
                <button class="btn btn-sm btn-danger btn-wth-icon icon-wthot-bg mb-15" id="tambah"><span
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
                                                    <th>Besar Pagu</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->kota->nama_kota}}</td>
                                                    <td>{{$d->transportasi->nama_transportasi}}</td>
                                                    <td>Rp.{{$d->besar_pagu}} / Hari</td>
                                                    <td>
                                                        @if($d->kota->zona == 1)
                                                        Luar Kecamatan Dalam Daerah
                                                        @elseif($d->kota->zona == 2)
                                                        Luar Kota Dalam Provinsi
                                                        @else
                                                        Luar Kota luar Provinsi
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{Route('kategoriSPPDEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-primary  "><span class="icon-label"><i
                                                                    class="fa fa-edit"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                        <button class="btn btn-sm btn-danger" onclick="Hapus('')"> <i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tujuan</th>
                                                    <th>Transportasi</th>
                                                    <th>Besar Pagu</th>
                                                    <th>Status</th>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="status">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('kategoriSPPDCreate')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Pilih Tujuan</label>
                        <select name="kota_id" id="kota_id" class="form-control">
                            <option value="">-- Pilih tujuan --</option>
                            @foreach ($kota as $d)
                            <option value="{{$d->id}}">{{$d->nama_kota}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Transport</label>
                        <select name="transportasi_id" id="transportasi_id" class="form-control">
                            <option value="">--Pilih jenis transportasi --</option>
                            @foreach ($transportasi as $d)
                            <option value="{{$d->id}}">{{$d->nama_transportasi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">besaran Pagu / hari</label>
                        <input type="text" name="besar_pagu" class="form-control">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Tambah Data</button>
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