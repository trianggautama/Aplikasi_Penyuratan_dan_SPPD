@extends('layouts.main')

@section('content')
 <!-- Main Content -->
 <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
				<!-- /Title -->
				<div class="row">
                    <div class="col-xl-12 pa-0">
                        <div class="faq-search-wrap bg-green-light-2">
                            <div class="container-fluid">
                                <h1 class="display-5 text-white mb-20">Selamat Datang Admin</h1>
                            </div>
                        </div>

				<!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
						<div class="hk-row">
							<div class="col-sm-12">
								<div class="card-group hk-dash-type-2">
								
									<div class="card card-sm">
										<div class="card-body">
											<div class="d-flex justify-content-between mb-5">
												<div>
													<span class="d-block font-15 text-dark font-weight-500">Surat Keluar</span>
												</div>
											</div>
											<div>
												<span class="d-block display-4 text-dark mb-5"><span class="counter-anim">{{$suratKeluar}}</span></span>
												<small class="d-block text-success">buah surat</small>
											</div>
										</div>
									</div>
									<div class="card card-sm">
										<div class="card-body">
											<div class="d-flex justify-content-between mb-5">
												<div>
													<span class="d-block font-15 text-dark font-weight-500">Surat Masuk</span>
												</div>
											</div>
											<div>
												<span class="d-block display-4 text-dark mb-5"><span class="counter-anim">{{$suratMasuk}}</span></span>
												<small class="d-block text-success">buah surat</small>
											</div>
										</div>
									</div>
									<div class="card card-sm">
										<div class="card-body">
											<div class="d-flex justify-content-between mb-5">
												<div>
													<span class="d-block font-15 text-dark font-weight-500">SPPD</span>
												</div>
											</div>
											<div>
												<span class="d-block display-4 text-dark mb-5">{{$sppd}}</span>
												<small class="d-block text-success">Berkas SPPD</small>
											</div>
										</div>
									</div>
								
									<div class="card card-sm">
										<div class="card-body">
											<div class="d-flex justify-content-between mb-5">
												<div>
													<span class="d-block font-15 text-dark font-weight-500">Disposisi</span>
												</div>

											</div>
											<div>
												<span class="d-block display-4 text-dark mb-5">{{$disposisi}}</span>
												<small class="d-block text-success">Disposisi</small>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
						<div class="hk-row">
							<div class="col-sm-12">
								<div class="card-group hk-dash-type-2">
									<div class="card card-sm">
										<div class="card-body">
											<div class="d-flex justify-content-between mb-5">
												<div>
													<span class="d-block font-15 text-dark font-weight-500">Peminjaman</span>
												</div>
											</div>
											<div>
												<span class="d-block display-4 text-dark mb-5">{{$peminjaman}}</span>
												<small class="d-block text-success">Buah Surat</small>
											</div>
										</div>
									</div>
								
									<div class="card card-sm">
										<div class="card-body">
											<div class="d-flex justify-content-between mb-5">
												<div>
													<span class="d-block font-15 text-dark font-weight-500">Pegawai</span>
												</div>
											</div>
											<div>
												<span class="d-block display-4 text-dark mb-5"><span class="counter-anim">{{$pegawai}}</span></span>
												<small class="d-block text-success">pegawai</small>
											</div>
										</div>
									</div>
								
									<div class="card card-sm">
										<div class="card-body">
											<div class="d-flex justify-content-between mb-5">
												<div>
													<span class="d-block font-15 text-dark font-weight-500">SK</span>
												</div>
											</div>
											<div>
												<span class="d-block display-4 text-dark mb-5">{{$sk}}</span>
												<small class="d-block text-success">Pengajuan SK</small>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
			
            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Pampered by<a href="https://hencework.com/" class="text-dark" target="_blank">Hencework</a> © 2019</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="d-inline-block">Follow us</p>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
@endsection
