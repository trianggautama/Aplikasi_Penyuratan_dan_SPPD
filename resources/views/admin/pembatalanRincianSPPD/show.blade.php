@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Halaman Surat Pembatalan SPPD</h2>
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
                                                    <th>No Surat Pembatalan</th>
                                                    <th>Nomor Surat Tugas SPPD</th>
                                                    <th>Pegawai</th>
                                                    <th>Pejabat </th>
                                                    <th>Alasan pembatalan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sppd->pembatalan_rincian_sppd as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->no_surat}}</td>
                                                    <td>{{$d->sppd->no_surat_tugas}}</td>
                                                    <td>{{$d->rincian_sppd->pegawai->nama}}</td>
                                                    <td>{{$d->pegawai->nama}}</td>
                                                    <td>{!!$d->alasan!!}</td>
                                                    <td>
                                                        <a href="{{Route('pembatalanRincianSPPDCetak','nkjsnjnj')}}"
                                                            class="btn btn-sm btn-success  m-1" target="_blank"><span
                                                                class="icon-label"><i class="fa fa-print"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                        <a href="{{Route('pembatalanRincianSPPDEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-primary  m-1"><span
                                                                class="icon-label"><i class="fa fa-edit"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                        <button class="btn btn-sm btn-danger m-1" onclick="Hapus()">
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
                <form action="{{Route('pembatalanRincianSPPDCreate')}}" method="POST">
                    @csrf
                    <input type="hidden" name="sppd_id" value="{{$sppd->id}}" id="sppd_id">
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Nomor Surat Pembatalan SPPD</label>
                        <input type="text" name="no_surat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">pegawai </label>
                        <select name="rincian_sppd_id" id="rincian_sppd_id" class="form-control" required>
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach ($rincianSppd as $d)
                            <option value="{{$d->id}}">{{$d->pegawai->nama}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Pejabat Pembuat Keputusan</label>
                        <select name="pegawai_id" id="pegawai_id" class="form-control" required>
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach ($pegawai as $d)
                            <option value="{{$d->id}}">{{$d->nama}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Alasan Pembatalan</label>
                        <textarea name="alasan" id="alasan" rows="10" class="tinymce"></textarea>
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