@extends('layouts.main')

@section('content')
 <!-- Main Content -->
 <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
				<!-- Title -->
				<div class="hk-pg-header align-items-top">
					<div>
						<h2 class="hk-pg-title font-weight-600 mb-10">Nomor Agenda Edit</h2>
					</div>
				</div>
				<!-- /Title -->
				<!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
						<div class="hk-row">
							<div class="col-lg-12">
                            <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Form Edit</h5>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleDropdownFormEmail1">Nomor Agenda</label>
                                            <input type="text" class="form-control" id="no_agenda" placeholder="no_agenda">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleDropdownFormEmail1">keterangan</label>
                                            <input type="text" class="form-control" id="keterangan" placeholder="keterangan">
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Ubah Data</button>
                                        </div>
                                </form>
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

@endsection
@section('scripts')
    <script>
       $("#tambah").click(function(){
            $('#status').text('Tambah Data');
            $('#exampleModalForms').modal('show');
        });
    </script>
@endsection