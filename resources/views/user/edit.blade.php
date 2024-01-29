@extends('layouts.app')

@section('title')
    Edit User
@stop

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> USER </h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-money-check-alt"></i> EDIT USER </h4>
                    </div>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NAMA LENGKAP</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                            placeholder="Masukkan Nama Lengkap" class="form-control">

                                        @error('name')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>EMAIL</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email', $user->email) }}" placeholder="Masukkan Email">

                                        @error('tanggal')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ROLE</label>
                                        <select class="form-control select2" name="role">
                                            <option value="{{ $user->role }}">{{ $user->role }}</option>
                                            <option value="admin">Admin</option>
                                            <option value="pemegang_saham">Pemegang Saham</option>
                                        </select>

                                        @error('role')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password Baru (kosongkan jika tidak ingin mengubah)</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password Baru</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                UPDATE</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i>
                                RESET</button>

                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        // if ($(".datetimepicker").length) {
        //     $('.datetimepicker').daterangepicker({
        //         locale: {
        //             format: 'YYYY-MM-DD hh:mm'
        //         },
        //         singleDatePicker: true,
        //         timePicker: true,
        //         timePicker24Hour: true,
        //     });
        // }

        //var cleaveC = new Cleave('.currency', {
        //    numeral: true,
        //    numeralThousandsGroupStyle: 'thousand'
        //});

        var timeoutHandler = null;

        /**
         * btn submit loader
         */
        $(".btn-submit").click(function() {
            $(".btn-submit").addClass('btn-progress');
            if (timeoutHandler) clearTimeout(timeoutHandler);

            timeoutHandler = setTimeout(function() {
                $(".btn-submit").removeClass('btn-progress');

            }, 1000);
        });

        /**
         * btn reset loader
         */
        $(".btn-reset").click(function() {
            $(".btn-reset").addClass('btn-progress');
            if (timeoutHandler) clearTimeout(timeoutHandler);

            timeoutHandler = setTimeout(function() {
                $(".btn-reset").removeClass('btn-progress');

            }, 500);
        })
    </script>
@stop
