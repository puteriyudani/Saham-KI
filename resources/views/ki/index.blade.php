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

                @if (isset($kewajibaninvestasis))
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-chart-area"></i> KEWAJIBAN INVESTASI IMAGI </h4>
                            <a class="ml-2" href="{{ route('kewajibaninvestasi.create') }}"><i class="fas fa-plus"></i></a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th scope="row" style="width: 170px">Total Modal Awal</th>
                                        @foreach ($modaldasar as $modal)
                                            <td>Rp. {{ number_format($modal->nominal, 0, ',', '.') }}</td>
                                        @endforeach
                                    </tr>
                                </table>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center;width: 6%">NO.</th>
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
                                        @forelse ($kewajibaninvestasis as $kewajibaninvestasi)
                                            <tr>
                                                <th scope="row" style="text-align: center">{{ $no++ }}</th>
                                                <td>{{ $kewajibaninvestasi->nama }}</td>
                                                <td>{{ number_format($kewajibaninvestasi->nominal, 0, ',', '.') }}</td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('kewajibaninvestasi.edit', ['kewajibaninvestasi' => $kewajibaninvestasi->id]) }}"
                                                        class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <!-- Delete Button -->
                                                    <form action="{{ route('kewajibaninvestasi.destroy', ['kewajibaninvestasi' => $kewajibaninvestasi->id]) }}"
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
                                    {{ $kewajibaninvestasis->links('vendor.pagination.bootstrap-4') }}
                                </div>

                            </div>

                        </div>
                    </div>
                @endif


            </div>
        </section>
    </div>

@stop
