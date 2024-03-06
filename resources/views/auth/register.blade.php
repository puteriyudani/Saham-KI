<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/imagi/imagi-white.jpeg') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body style="background: #f3f3f3">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="{{ asset('assets/img/imagi/imagi-white.jpeg') }}" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>DAFTAR AKUN</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('register.post') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="name">Nama Lengkap</label>
                                            <input id="name" type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" autofocus>
                                            @error('name')
                                                <div class="invalid-feedback" style="display: block">
                                                    Masukkan Nama Lengkap Anda !
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="role">Role</label>
                                            <select class="form-select" name="role" id="role"
                                                aria-label="Floating label select example">
                                                <option selected>Role</option>
                                                <option value="admin">Admin</option>
                                                <option value="pemegang_saham">Pemegang Saham</option>
                                                <option value="komisaris_utama">Komisaris Utama</option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback" style="display: block">
                                                    Pilih Role !
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Alamat Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback" style="display: block">
                                                Masukkan Alamat Email Anda !
                                            </div>
                                        @enderror

                                        <div class="row" style="margin-top: 30px">
                                            <div class="form-group col-6">
                                                <label for="password" class="d-block">Password</label>
                                                <input id="password" type="password" class="form-control pwstrength"
                                                    data-indicator="pwindicator" name="password">
                                                <div id="pwindicator" class="pwindicator">
                                                    <div class="bar"></div>
                                                    <div class="label"></div>
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback" style="display: block">
                                                        Masukkan Password Anda !
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="password_confirmation" class="d-block">Konfirmasi
                                                    Password</label>
                                                <input id="password_confirmation" type="password" class="form-control"
                                                    name="password_confirmation">
                                                @error('password')
                                                    <div class="invalid-feedback" style="display: block">
                                                        Konfirmasi Password Salah !
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                DAFTAR
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            <strong>Copyright</strong> © <strong>IMAGI</strong> <?php echo date('Y'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
