@extends('layouts.app')

@section('title')
    Edit Modal Dasar
@stop

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> MODAL DASAR </h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-money-check-alt"></i> EDIT MODAL DASAR </h4>
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

                        <form action="{{ route('modaldasar.update', $modaldasar->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NOMINAL (Rp.)</label>
                                        <input type="text" name="nominal" value="{{ old('nominal', $modaldasar->nominal) }}" placeholder="Masukkan Nominal" class="form-control currency">

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
