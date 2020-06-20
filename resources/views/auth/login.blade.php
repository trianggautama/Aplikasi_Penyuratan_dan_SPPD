<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Aplikasi Penyuratan dan SPPD</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Custom CSS -->
    <link href="{{asset('admin/dist/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>


    <!-- HK Wrapper -->
    <div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex align-items-center">
            <img src="{{asset('logo.png')}}" alt="" width="40px" height="40px">
            <a class="navbar-brand text-green" href="{{Route('index')}}">
                Aplikasi Penyuratan dan SPPD
            </a>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 pa-0">
                        <div class="auth-cover-img overlay-wrap">
                            <img class="mt-100" src="{{asset('admin/dist/img/bg.png')}}" alt="" width="800px">
                        </div>
                    </div>
                    <div class="col-xl-7 pa-0">
                        <div class="auth-form-wrap py-xl-0 py-50">
                            <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <h1 class="display-5 mb-10">Selamat Datang : )</h1>
                                    <p class="mb-30">Silahkan Login untuk mengakses aplikasi</p>
                                    <div class="form-group">
                                        <input id="username" type="username"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus
                                            placeholder="username">
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Password">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="feather-icon"><i
                                                            data-feather="eye-off"></i></span></span>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> 

                                    <button type="submit" class="btn btn-success btn-block" type="submit">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="{{asset('admin/vendors/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{asset('admin/dist/js/jquery.slimscroll.js')}}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{asset('admin/dist/js/dropdown-bootstrap-extended.js')}}"></script>

    <!-- Owl JavaScript -->
    <script src="{{asset('admin/vendors/owl.carousel/dist/owl.carousel.min.js')}}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{asset('admin/dist/js/feather.min.js')}}"></script>

    <!-- Init JavaScript -->
    <script src="{{asset('admin/dist/js/init.js')}}"></script>
    <script src="{{asset('admin/dist/js/login-data.js')}}"></script>
</body>

</html>