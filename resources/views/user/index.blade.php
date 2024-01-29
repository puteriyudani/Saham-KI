@extends('layouts.app')

@section('title')
    Admin - Kelola User
@stop

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> USER </h1>
            </div>

            <div class="section-body">

                @if (isset($users))
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                            <th scope="col">NAMA</th>
                                            <th scope="col">EMAIL</th>
                                            <th scope="col">ROLE</th>
                                            <th scope="col" colspan="2">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        {{-- isi --}}
                                        @forelse ($users as $user)
                                            <tr>
                                                <th scope="row" style="text-align: center">{{ $no++ }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                                        class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <!-- Delete Button -->
                                                    <form action="{{ route('user.destroy', ['user' => $user->id]) }}"
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
                                    {{ $users->links('vendor.pagination.bootstrap-4') }}
                                </div>

                            </div>

                        </div>
                    </div>
                @endif


            </div>
        </section>
    </div>

@stop
