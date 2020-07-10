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
                <a href="{{Route('notaDinasCetak',['uuid'=>$data->uuid])}}" class="btn btn-sm btn-success btn-wth-icon icon-wthot-bg mb-15 mr-5" target="_blank"><span class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Nota Dinas  </span></a>
                <a href="{{Route('suratTugasCetak',['uuid'=>$data->uuid])}}" class="btn btn-sm btn-success btn-wth-icon icon-wthot-bg mb-15 mr-5" target="_blank"><span class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Surat Tugas  </span></a>
                <a href="{{Route('sppdCetak',['uuid'=>$data->uuid])}}" class="btn btn-sm btn-success btn-wth-icon icon-wthot-bg mb-15 mr-5" target="_blank"><span class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Berkas SPPD  </span></a>
                <a href="{{Route('kuitansiCetak',['uuid'=>$data->uuid])}}" class="btn btn-sm btn-success btn-wth-icon icon-wthot-bg mb-15" target="_blank"><span class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Cetak Kuitansi SPPD </span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Detail Data</h5>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">Kategori</h5>
                                
                                                    @if($data->kategori->kota->zona == 1)
                                                        Luar Kecamatan Dalam Daerah
                                                    @elseif($data->kategori->kota->zona == 2)
                                                        Luar Kota Dalam Provinsi
                                                    @else
                                                        Luar Kota luar Provinsi
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">tujuan</h5>
                                                    <p>{{$data->kategori->kota->nama_kota}}</p>
                                                </div>
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">Tempat</h5>
                                                    <p>{{$data->tempat}}</p>
                                                </div>
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">Transportasi</h5>
                                                    <p>{{$data->kategori->transportasi->nama_transportasi}}</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">Tanggal Berangkat</h5>
                                                    <p>{{carbon\carbon::parse($data->tanggal_berangkat)->translatedFormat('d F Y')}}</p>
                                                </div>
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">Tanggal Kepulangan</h5>
                                                    <p>{{carbon\carbon::parse($data->tanggal_kepulangan)->translatedFormat('d F Y')}}</p>
                                                </div>
                                                <div class="form-group">
                                                    <h5 for="exampleDropdownFormEmail1">Maksud Keberangkatan</h5>
                                                    <p>{{$data->maksud_tujuan}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <button class="btn btn-sm btn-success btn-wth-icon icon-wthot-bg mb-15" id="tambah"><span
                    class="icon-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Tambah Pegawai
                </span></button>
        </div>

        <section class="hk-sec-wrapper">
            <h5 class="hk-sec-title">Rincian Pegawai</h5>
            <br>
            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">
                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Golongan </th>
                                    <th>Jabatan</th>
                                    <th>Total Anggaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->rincian_sppd as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->pegawai->nama}}</td>
                                    <td>{{$d->pegawai->golongan->golongan}}</td>
                                    <td>{{$d->pegawai->jabatan->jabatan}}</td>
                                    <td>Rp. 2500.000</td>
                                    <td>
                                        <a href="{{Route('rincianAnggaran','hshh')}}" class="btn btn-sm btn-primary m-1 text-white" > <i class="fa fa-dollar"></i> Anggaran Ril</a>
                                        <button class="btn btn-sm btn-danger m-1" onclick="Hapus('{{$d->uuid}}','{{$d->pegawai->nama}}')"> <i
                                                class="fa fa-trash"></i></button>
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
                <form action="{{Route('rincianStore')}}" method="POST">
                    @csrf
                    <input type="hidden" name="sppd_id" value="{{$data->id}}" id="">
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Pegawai</label>
                        <select name="pegawai_id" id="pegawai_id" class="form-control">
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach ($pegawai as $d)
                            <option value="{{$d->id}}">{{$d->nama}}</option>
                            @endforeach
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

        function Hapus(uuid, nama) {
			Swal.fire({
			title: 'Anda Yakin?',
			text: " Menghapus Data SPPD '" + nama ,        
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				url = '{{route("rincianDestroy",'')}}';
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }
</script>
@endsection