@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Halaman Laporan SPPD</h2>
            </div>
            <div class="d-flex">
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
                                                    <th>Tanggal Berangkat</th>
                                                    <th>Tanggal Kepulangan</th>
                                                    <th>Maksud Tujuan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->sppd->kategori->kota->nama_kota}}</td>
                                                    <td>{{carbon\carbon::parse($d->sppd->tanggal_berangkat)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td>{{carbon\carbon::parse($d->sppd->tanggal_kembali)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td>{{$d->sppd->maksud_tujuan}}</td>
                                                    <td>
                                                        <a href="{{Route('laporanSPPDCetak',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-success  m-1" target="_blank"><span
                                                                class="icon-label"><i class="fa fa-print"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                        <a href="{{Route('laporanSPPDEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-primary  m-1"><span
                                                                class="icon-label"><i class="fa fa-edit"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                        <button class="btn btn-sm btn-danger m-1" onclick="Hapus('{{$d->uuid}}')">
                                                            <i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tujuan</th>
                                                    <th>Tanggal Berangkat</th>
                                                    <th>Tanggal Kepulangan</th>
                                                    <th>Maksud Tujuan</th>
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
                <form action="{{Route('laporanSPPDCreate')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">SPPD</label>
                        <select name="sppd_id" id="sppd_id" class="form-control">
                            <option value="">-- Pilih SPPD --</option>
                            @foreach ($sppd as $d)
                            <option value="{{$d->id}}">{{$d->maksud_tujuan}}, {{$d->kategori->kota->nama_kota}},
                                {{carbon\carbon::parse($d->tanggal_berangkat)->translatedFormat('d F Y')}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Isi laporan</label>
                        <textarea name="isi" id="isi" rows="10" class="tinymce"></textarea>
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

        function Hapus(uuid) {
			Swal.fire({
			title: 'Anda Yakin?',
			text: " Menghapus Data Laporan SPPD" ,        
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				url = '{{route("laporanSPPDDestroy",'')}}';
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }
</script>
@endsection