<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Aplikasi Penyuratan dan SPPD</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="{{asset('admin/vendors/jquery-toggles/css/toggles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/vendors/jquery-toggles/css/themes/toggles-light.css')}}" rel="stylesheet"
        type="text/css">
    <link href="{{asset('admin/vendors/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet"
        type="text/css">
    <link href="{{asset('admin/vendors/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />

    <!-- Data Table CSS -->
    <link href="{{asset('admin/vendors/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('admin/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}"
        rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="{{asset('admin/vendors/jquery-toggles/css/toggles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/vendors/jquery-toggles/css/themes/toggles-light.css')}}" rel="stylesheet"
        type="text/css">
    <link href="{{asset('admin/dist/css/style.css')}}" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-alt-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
            <img src="{{asset('logo.png')}}" alt="" width="40px" height="40px">
            <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse"
                data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false"
                aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand text-green" href="{{Route('index')}}">
                Aplikasi Penyuratan dan SPPD
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown show-on-hover active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Master Data
                        </a>
                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <a class="dropdown-item" href="{{Route('userIndex')}}">User</a>
                            <a class="dropdown-item" href="{{Route('pegawaiIndex')}}">Pegawai</a>
                            <a class="dropdown-item" href="{{Route('golonganIndex')}}">Golongan</a>
                            <a class="dropdown-item" href="{{Route('jabatanIndex')}}">Jabatan</a>
                            <a class="dropdown-item" href="{{Route('unitIndex')}}">Unit Kerja</a>
                            <a class="dropdown-item" href="{{Route('kotaIndex')}}">Kota</a>
                            <a class="dropdown-item" href="{{Route('transportasiIndex')}}">Transportasi</a>
                            <a class="dropdown-item" href="{{Route('agendaIndex')}}">Nomor Agenda</a>
                            <a class="dropdown-item" href="{{Route('suratPermohonanIndex')}}">Jenis Surat</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show-on-hover active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Surat
                        </a>
                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <a class="dropdown-item" href="{{Route('suratMasukIndex')}}">Surat Masuk</a>
                            <a class="dropdown-item" href="{{Route('suratKeluarIndex')}}">Surat Keluar</a>
                            <a class="dropdown-item" href="{{Route('suratDisposisiIndex')}}">Disposisi Surat</a>
                            <a class="dropdown-item" href="{{Route('peminjamanIndex')}}">Data Peminjaman</a>
                            <a class="dropdown-item" href="{{Route('skIndex')}}">SK</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show-on-hover active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            SPPD
                        </a>
                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <a class="dropdown-item" href="{{Route('anggaranSPPDIndex')}}">Anggaran SPPD</a>
                            <a class="dropdown-item" href="{{Route('kategoriSPPDIndex')}}">Kategori SPPD</a>
                            <a class="dropdown-item" href="{{Route('SPPDIndex')}}">Berkas SPPD</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show-on-hover active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Laporan
                        </a>
                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <a class="dropdown-item" href="{{Route('laporanSPPDIndex')}}">Laporan SPPD</a>
                            <a class="dropdown-item" href="{{Route('SPPDFilterWaktu')}}">Laporan Data SPPD</a>
                            <a class="dropdown-item" href="{{Route('analisisSPPD')}}" target="_blank">Analisis SPPD</a>
                            <a class="dropdown-item" href="{{Route('analisisSurat')}}" target="_blank">Analisis
                                Surat</a>
                            <a class="dropdown-item" href="{{Route('anggaranSPPDfilter')}}">Laporan Anggaran</a>
                            <a class="dropdown-item" href="{{Route('laporanAnggaranSPPD')}}">Laporan Pengeluaran
                                SPPD</a>
                            <a class="dropdown-item" href="{{Route('laporanSPPDIndex')}}">Laporan Perjalanan Dinas </a>
                            <a class="dropdown-item" href="{{Route('suratMasukFilter')}}">Laporan Surat Masuk</a>
                            <a class="dropdown-item" href="{{Route('suratKeluarFilter')}}">Laporan Surat Keluar </a>
                            <a class="dropdown-item" href="{{Route('suratDisposisiFilter')}}">Laporan Surat Disposisi
                            </a>
                            <a class="dropdown-item" href="{{Route('peminjamanFilter')}}">Laporan Surat Peminjaman </a>
                            <a class="dropdown-item" href="{{Route('skFilter')}}">Laporan Registrasi SK </a>
                        </div>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item">
                    <a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span
                            class="feather-icon"><i data-feather="bell"></i></span></a>
                </li>
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="{{asset('admin/dist/img/avatar1.jpg')}}" alt="user"
                                        class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>{{Auth::user()->nama}}<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="dropdown-icon zmdi zmdi-power"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /Top Navbar -->
        @yield('content')
    </div>
    <!-- /HK Wrapper -->
    @include('sweetalert::alert')
    <!-- jQuery -->
    <script src="{{asset('admin/vendors/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{asset('admin/dist/js/jquery.slimscroll.js')}}"></script>

    <!-- Tinymce JavaScript -->
    <script src="{{asset('admin/vendors/tinymce/tinymce.min.js')}}"></script>

    <!-- Tinymce Wysuhtml5 Init JavaScript -->
    <script src="{{asset('admin/dist/js/tinymce-data.js')}}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{asset('admin/dist/js/feather.min.js')}}"></script>

    <!-- Toggles JavaScript -->
    <script src="{{asset('admin/vendors/jquery-toggles/toggles.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/toggle-data.js')}}"></script>

    <!-- Counter Animation JavaScript -->
    <script src="{{asset('admin/vendors/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/vendors/jquery.counterup/jquery.counterup.min.js')}}"></script>

    <!-- Easy pie chart JS -->
    <script src="{{asset('admin/vendors/easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>

    <!-- EChartJS JavaScript -->
    <script src="{{asset('admin/vendors/echarts/dist/echarts-en.min.js')}}"></script>

    <!-- Owl JavaScript -->
    <script src="{{asset('admin/vendors/owl.carousel/dist/owl.carousel.min.js')}}"></script>

    <!-- Toastr JS -->
    <script src="{{asset('admin/vendors/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>

    <!-- Data Table JavaScript -->
    <script src="{{asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/dataTables-data.js')}}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{asset('admin/dist/js/dropdown-bootstrap-extended.js')}}"></script>
    <!-- Init JavaScript -->
    <script src="{{asset('admin/dist/js/init.js')}}"></script>
    <script src="{{asset('admin/dist/js/dashboard4-data.js')}}"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @yield('scripts')
</body>

</html>