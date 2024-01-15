@extends('layouts.app')

@section('title')
    Investasi Saham
@stop

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> INVESTASI SAHAM </h1>
            </div>

            <div class="section-body">

                @if (isset($sahams))
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-chart-area"></i> SAHAM IMAGI </h4>
                            <a class="ml-2" href="{{ route('saham.create') }}"><i class="fas fa-plus"></i></a>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                            <th scope="col">TANGGAL</th>
                                            <th scope="col">KETERANGAN</th>
                                            <th scope="col">NAMA</th>
                                            <th scope="col">NOMINAL</th>
                                            <th scope="col" colspan="2">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        {{-- isi --}}
                                        @forelse ($sahams as $saham)
                                            <tr>
                                                <th scope="row" style="text-align: center">{{ $no++ }}</th>
                                                <td>{{ $saham->tanggal }}</td>
                                                <td>{{ $saham->keterangan }}</td>
                                                <td>{{ $saham->nama }}</td>
                                                <td>{{ number_format($saham->nominal, 0, ',', '.') }}</td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('saham.edit', ['saham' => $saham->id]) }}"
                                                        class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <!-- Delete Button -->
                                                    <form action="{{ route('saham.destroy', ['saham' => $saham->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td style="color: red" colspan="7">Data belum tersedia</td>
                                            </tr>
                                        @endforelse
                                        {{-- end isi --}}
                                    </tbody>
                                </table>


                                <div style="text-align: center">
                                    {{ $sahams->links('vendor.pagination.bootstrap-4') }}
                                </div>

                            </div>

                        </div>
                    </div>
                @endif


            </div>
        </section>
    </div>

@stop
