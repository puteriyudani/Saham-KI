@extends('layouts.app')

@section('title')
    Dashboard Admin
@stop

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> DASHBOARD </h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-chart-area"></i> ADMIN </h4>
                    </div>

                    <div class="card-body">
                        @foreach ($modaldasars as $modaldasar)
                            <a href="{{ route('modaldasar.edit', ['modaldasar' => $modaldasar->id]) }}" class="btn btn-primary">Modal Dasar</a>
                        @endforeach
                        <a href="{{ route('kewajibaninvestasi.index') }}" class="btn btn-success">Kewajiban Investasi</a>
                    </div>
                </div>
            </div>

        </section>
    </div>

@stop
