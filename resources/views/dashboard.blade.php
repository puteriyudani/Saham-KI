@extends('layouts.app')

@section('title')
    Dashboard
@stop

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> DASHBOARD </h1>
            </div>

            <div class="section-body">

                @if (isset($saham))
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-chart-area"></i> SAHAM IMAGI </h4>
                            <a class="ml-2" href="{{ route('saham.create') }}"><i class="fas fa-plus"></i></a>
                            <a class="ml-2" href="{{ route('saham.index') }}"><i class="fas fa-edit"></i></a>
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
                                            <th scope="col">TANGGAL</th>
                                            <th scope="col">KETERANGAN</th>
                                            @forelse ($pemegangsahams as $pemegangsaham)
                                                <th scope="col">{{ $pemegangsaham->name }}</th>
                                            @empty
                                                <th scope="col" style="color: red">Data belum tersedia</th>
                                            @endforelse
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $groupedNominals = [];
                                        @endphp
                                        {{-- isi --}}
                                        @forelse ($saham as $investasi)
                                            @php
                                                $key = $investasi->tanggal . '_' . $investasi->keterangan;
                                                $groupedNominals[$key][$investasi->nama][] = $investasi->nominal;
                                            @endphp
                                        @empty
                                            <tr>
                                                <td style="color: red" colspan="{{ count($pemegangsahams) + 3 }}">Data belum tersedia</td>
                                            </tr>
                                        @endforelse
                                
                                        @foreach ($groupedNominals as $key => $nominals)
                                            @php
                                                list($date, $description) = explode('_', $key);
                                            @endphp
                                            <tr>
                                                <th scope="row" style="text-align: center">{{ $no++ }}</th>
                                                <td>{{ $date }}</td>
                                                <td>{{ $description }}</td>
                                                @forelse ($pemegangsahams as $pemegangsaham)
                                                    <td>
                                                        @if (isset($nominals[$pemegangsaham->name]))
                                                            @foreach ($nominals[$pemegangsaham->name] as $nominal)
                                                                {{ number_format($nominal, 0, ',', '.') }}<br>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                @empty
                                                    <td style="color: red" colspan="{{ count($pemegangsahams) }}">Data belum tersedia</td>
                                                @endforelse
                                            </tr>
                                        @endforeach
                                
                                        <tr>
                                            <th scope="row" colspan="3" style="width: 250px">Total</th>
                                            @foreach ($pemegangsahams as $pemegangsaham)
                                                <td>
                                                    {{ number_format($totalNominals[$pemegangsaham->name] ?? 0, 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                        </tr>
                                        {{-- end isi --}}
                                        <tr>
                                            <th scope="row" colspan="3" style="width: 250px">Kewajiban Investasi</th>
                                            @forelse ($kewajibaninvestasi as $ki)
                                                @forelse ($pemegangsahams as $pemegangsaham)
                                                    @if ($ki->nama === $pemegangsaham->name)
                                                        <th scope="col">{{ number_format($ki->nominal, 0, ',', '.') }}</th>
                                                    @endif
                                                @empty
                                                    <th scope="col" style="color: red">Data belum tersedia</th>
                                                @endforelse
                                            @empty
                                                <th scope="col" style="color: red">Data belum tersedia</th>
                                            @endforelse
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="3" style="width: 250px">Progress Investasi Saat Ini</th>
                                            @foreach ($pemegangsahams as $pemegangsaham)
                                                <td>
                                                    {{ number_format($persentase[$pemegangsaham->name]) }}%
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="3" style="width: 250px">Hutang Investasi</th>
                                            @foreach ($pemegangsahams as $pemegangsaham)
                                                <td>
                                                    {{ number_format($hutangInvestasi[$pemegangsaham->name] ?? 0, 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>                                
                                
                                <div style="text-align: center">
                                    {{ $saham->links('vendor.pagination.bootstrap-4') }}
                                </div>

                            </div>

                        </div>
                    </div>
                @endif


            </div>
        </section>
    </div>

@stop
