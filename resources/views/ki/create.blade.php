@extends('layouts.app')

@section('title')
    Kewajiban Investasi
@stop

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> KEWAJIBAN INVESTASI </h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-money-check-alt"></i> TAMBAH KEWAJIBAN INVESTASI </h4>
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

                        <form action="{{ route('kewajiban-investasi.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NAMA</label>
                                        <select class="form-control select2" name="nama" style="width: 100%">
                                            <option value="">-- PILIH NAMA --</option>
                                            @foreach ($pemegangsahams as $pemegangsaham)
                                                <option value="{{ $pemegangsaham->name }}"> {{ $pemegangsaham->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('nama')
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
                                        <label>NOMINAL (Rp.)</label>
                                        <input type="text" name="nominal" value="{{ old('nominal') }}" placeholder="Masukkan Nominal" class="form-control currency">

                                        @error('nominal')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>

                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>

        /**
         * btn submit loader
         */
        $( ".btn-submit" ).click(function()
        {
            $( ".btn-submit" ).addClass('btn-progress');
            if (timeoutHandler) clearTimeout(timeoutHandler);

            timeoutHandler = setTimeout(function()
            {
                $( ".btn-submit" ).removeClass('btn-progress');

            }, 1000);
        });

    </script>
@stop
