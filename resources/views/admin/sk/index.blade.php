@extends('layouts.main')

@section('content')
 <!-- Main Content -->
 <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
				<!-- Title -->
				<div class="hk-pg-header align-items-top">
					<div>
						<h2 class="hk-pg-title font-weight-600 mb-10">Register SK</h2>
					</div>
					<div class="d-flex">
						<button class="btn btn-sm btn-outline-light btn-wth-icon icon-wthot-bg mr-15 mb-15"><span class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Print </span></button>
						<button class="btn btn-sm btn-danger btn-wth-icon icon-wthot-bg mb-15" id="tambah"><span class="icon-label"><i class="fa fa-plus" ></i> </span><span class="btn-text">Tambah Data </span></button>
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
                                                    <th>Tanggal Register</th>
                                                    <th>Nomor Register</th>
                                                    <th>Jenis SK</th>
                                                    <th>Pemohon</th>
                                                    <th>Identitas</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>12 Januari 2020 </td>
                                                    <td>121313/BG-1/2020/123</td>
                                                    <td>Jenis 1</td>
                                                    <td>Anggi</td>
                                                    <td>Staff Ahli Hukum</td>
                                                    <td>		
                                                        <a href="{{Route('skEdit')}}" class="btn btn-sm btn-outline-light  "><span class="icon-label"><i class="fa fa-edit"></i> </span><span class="btn-text"> </span></a>
                                                        <button class="btn btn-sm btn-outline-light  "><span class="icon-label"><i class="fa fa-trash"></i> </span><span class="btn-text"> </span></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Register</th>
                                                    <th>Nomor Register</th>
                                                    <th>Jenis SK</th>
                                                    <th>Pemohon</th>
                                                    <th>Identitas</th>
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
        <div class="modal fade" id="exampleModalForms" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="status">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Tanggal Register</label>
                                <input type="date" class="form-control" id="tanggal_register" >
                            </div>  
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Nomor Register</label>
                                <input type="text" class="form-control" id="nomor_surat" placeholder="Nomor Surat">
                            </div>                          
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Jenis SK</label>
                                <select name="no_agenda_id" id="no_agenda_id" class="form-control">
                                    <option value="">-- Pilih Jenis sk --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Pemohon</label>
                                <input type="text" class="form-control" id="asal_surat" >
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Identitas</label>
                                <textarea name="isi_ringkas" id="isi_ringkas" class="form-control"></textarea>
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
    </script>
@endsection