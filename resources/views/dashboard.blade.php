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

            {{-- <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-chart-area"></i> DASHBOARD </h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('account.laporan_credit.check') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>TANGGAL AWAL</label>
                                    <input type="text" name="tanggal_awal" value="{{ old('tanggal_awal') }}" class="form-control datepicker">
                                </div>
                            </div>
                            <div class="col-md-2" style="text-align: center">
                                <label style="margin-top: 38px;">S/D</label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>TANGGAL AKHIR</label>
                                    <input type="text" name="tanggal_akhir" value="{{ old('tanggal_kahir') }}" class="form-control datepicker">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary mr-1 btn-submit btn-block" type="submit" style="margin-top: 30px"><i class="fa fa-filter"></i> FILTER</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div> --}}

            {{-- @if (isset($credit)) --}}
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-chart-area"></i> SAHAM KEDAI INDONESIA </h4>
                    <a class="ml-2" href="{{ route('saham.create') }}"><i class="fas fa-plus"></i></a>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th scope="row" style="width: 170px">Total Modal Awal</th>
                                @foreach ($modaldasar as $modal)
                                    <td>Rp. {{ number_format($modal->nominal,0,',','.') }}</td>
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
                                    <th scope="col">KHAIRI</th>
                                    <th scope="col">FADHIL</th>
                                    <th scope="col">MARHADI</th>
                                    <th scope="col">FAHMI</th>
                                    <th scope="col">RIDHO</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- isi --}}
                                <tr>
                                    <th scope="row" style="text-align: center">1</th>
                                    <td>10 Januari 2024</td>
                                    <td>Gaji</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: center">1</th>
                                    <td>10 Januari 2024</td>
                                    <td>Gaji</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: center">1</th>
                                    <td>10 Januari 2024</td>
                                    <td>Gaji</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                    <td>Rp.1.000.000</td>
                                </tr>
                                {{-- end isi --}}

                                <tr>
                                    <th scope="row" colspan="3" style="width: 250px">Kewajiban Investasi</th>
                                    <th>77.500.000</th>
                                    <th>52.500.000</th>
                                    <th>40.000.000</th>
                                    <th>40.000.000</th>
                                    <th>40.000.000</th>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3" style="width: 250px">Progress Investasi Saat Ini</th>
                                    <td>6%</td>
                                    <td>6%</td>
                                    <td>6%</td>
                                    <td>6%</td>
                                    <td>6%</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3" style="width: 250px">Hutang Investasi</th>
                                    <td>72.500.000</td>
                                    <td>72.500.000</td>
                                    <td>72.500.000</td>
                                    <td>72.500.000</td>
                                    <td>72.500.000</td>
                                </tr>
                            </tbody>
                            {{-- <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($credit as $hasil)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ $no }}</th>
                                    <td>{{ $hasil->name }}</td>
                                    <td>{{ rupiah($hasil->nominal) }}</td>
                                    <td>{{ $hasil->description }}</td>
                                    <td>{{ $hasil->credit_date }}</td>
                                </tr>
                                @php
                                $no++;
                                @endphp
                                @endforeach
                            </tbody> --}}
                        </table>
                        <div style="text-align: center">
                            {{-- {{$credit->links("vendor.pagination.bootstrap-4")}} --}}
                        </div>

                        {{-- <div style="text-align: center; margin-top: 20px;">
                            <a href="" class="btn btn-success">
                                <i class="fa fa-download"></i> Unduh PDF
                            </a>
                        </div> --}}
                    </div>

                </div>
            </div>
            {{-- @endif --}}


        </div>
    </section>
</div>
@stop