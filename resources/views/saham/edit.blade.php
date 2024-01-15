@extends('layouts.app')

@section('title')
    Edit Saham
@stop

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> INVESTASI SAHAM </h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-money-check-alt"></i> EDIT INVESTASI SAHAM </h4>
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

                        <form action="{{ route('saham.update', $saham->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NOMINAL (Rp.)</label>
                                        <input type="text" name="nominal" value="{{ old('nominal', $saham->nominal) }}" placeholder="Masukkan Nominal" class="form-control currency">

                                        @error('nominal')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TANGGAL</label>
                                        <input type="text" class="form-control datetimepicker" name="tanggal" value="{{ old('tanggal', $saham->tanggal) }}" placeholder="Pilih Tanggal">

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
                                        <label>NAMA</label>
                                        <select class="form-control select2" name="nama">
                                            <option value="">-- PILIH NAMA --</option>
                                            @foreach ($pemegangsahams as $pemegangsaham)
                                                @if($saham->nama == $pemegangsaham->name)
                                                    <option value="{{ $pemegangsaham->name }}" selected> {{ $pemegangsaham->name }}</option>
                                                @else
                                                    <option value="{{ $pemegangsaham->name }}"> {{ $pemegangsaham->name }}</option>
                                                @endif
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>KETERANGAN</label>
                                        <textarea class="form-control" name="keterangan" rows="6" placeholder="Masukkan Keterangan">{{ old('keterangan', $saham->keterangan) }}</textarea>

                                        @error('keterangan')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>

        if($(".datetimepicker").length) {
            $('.datetimepicker').daterangepicker({
                locale: {format: 'YYYY-MM-DD hh:mm'},
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true,
            });
        }

        //var cleaveC = new Cleave('.currency', {
        //    numeral: true,
        //    numeralThousandsGroupStyle: 'thousand'
        //});

        var timeoutHandler = null;

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

        /**
         * btn reset loader
         */
        $( ".btn-reset" ).click(function()
        {
            $( ".btn-reset" ).addClass('btn-progress');
            if (timeoutHandler) clearTimeout(timeoutHandler);

            timeoutHandler = setTimeout(function()
            {
                $( ".btn-reset" ).removeClass('btn-progress');

            }, 500);
        })

    </script>
@stop