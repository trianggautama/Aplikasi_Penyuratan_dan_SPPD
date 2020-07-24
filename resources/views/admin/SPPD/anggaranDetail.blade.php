@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h4 class="hk-pg-title font-weight-600 mb-10">Rincian Anggaran Riil ( {{$rincian->pegawai->nama}})</h4>
            </div>
            <div class="d-flex">
                <a href="{{Route('anggaranDetailCetak',['uuid'=>$rincian->uuid])}}"
                    class="btn btn-sm btn-success btn-wth-icon icon-wthot-bg mb-15 mr-5" target="_blank"><span
                        class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Rincian Anggaran
                        Riil
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
                            <h5 class="hk-sec-title">Detail Anggaran</h5>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pagu Harian</th>
                                                    <th>Pagu Representasi</th>
                                                    <th>Pagu Penginapan</th>
                                                    <th>Pagu Tiket Pesawat</th>
                                                    <th>Pagu Taksi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    @if(!$d->harian)
                                                    <td>-</td>
                                                    @else
                                                    <td>@currency($d->harian->besar_pagu)</td>
                                                    @endif
                                                    @if(!$d->representasi)
                                                    <td>-</td>
                                                    @else
                                                    <td>@currency($d->representasi->besar_pagu)</td>
                                                    @endif
                                                    @if(!$d->penginapan)
                                                    <td>-</td>
                                                    @else
                                                    <td>@currency($d->penginapan->besar_pagu)</td>
                                                    @endif
                                                    @if(!$d->tiket)
                                                    <td>-</td>
                                                    @else
                                                    <td>@currency($d->tiket->besar_pagu)</td>
                                                    @endif
                                                    @if(!$d->taksi)
                                                    <td>-</td>
                                                    @else
                                                    <td>@currency($d->taksi->besar_pagu)</td>
                                                    @endif
                                                    <td>
                                                        <a href="{{Route('rincianAnggaranEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-sm btn-info  "><span class="icon-label"><i
                                                                    class="fa fa-edit"></i>
                                                            </span><span class="btn-text"> </span></a>
                                                        <button class="btn btn-sm btn-danger" onclick="Hapus('')"> <i
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
                <form action="{{Route('anggaranDetailCreate')}}" method="POST">
                    @csrf
                    <input type="hidden" name="rincian_sppd_id" value="{{$rincian->id}}">
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">pagu Harian</label>
                        <select name="harian_id" id="harian_id" class="form-control">
                            <option value="">-- pilih pagu harian --</option>
                            @foreach($harian as $d)
                            <option value="{{$d->id}}">{{$d->kode_biaya}} - {{$d->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Pagu Representasi</label>
                        <select name="representasi_id" id="representasi_id" class="form-control">
                            <option value="">-- pilih pagu Representasi --</option>
                            @foreach($representasi as $d)
                            <option value="{{$d->id}}">{{$d->kategori}} - {{$d->golongan->kode_golongan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">pagu Penginapan</label>
                        <select name="penginapan_id" id="penginapan_id" class="form-control">
                            <option value="">-- pilih pagu penginapan --</option>
                            @foreach($penginapan as $d)
                            <option value="{{$d->id}}">{{$d->kategori}} - {{$d->golongan->kode_golongan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">pagu tiket Pesawat</label>
                        <select name="tiket_id" id="tiket_id" class="form-control">
                            <option value="">-- pilih pagu tiket pesawat --</option>
                            @foreach($tiket as $d)
                            <option value="{{$d->id}}">{{$d->kode_biaya}} - {{$d->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">pagu Taksi</label>
                        <select name="taksi_id" id="taksi_id" class="form-control">
                            <option value="">-- pilih pagu Taksi --</option>
                            @foreach($taksi as $d)
                            <option value="{{$d->id}}">{{$d->kode_biaya}} - {{$d->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Catatan</label>
                        <textarea name="catatan" id="" class="form-control"></textarea>
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
			text: " Menghapus Data Peminjaman nomor '" + nomor ,        
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				url = '{{route("skDestroy",'')}}';
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }
</script>
@endsection