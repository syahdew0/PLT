@extends('layouts.mainlayout')

@section('title', 'Index lokasi')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">

            <h1 class="text-danger pt-4 text-center mb-4">List of lokasi</h1>
            <hr>
            <div class="pb-2">
                <a href="{{ route('lokasi.create') }}" class="btn btn-success">New lokasi</a>

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama lokasi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lokasis as $lokasi)
                        <tr>
                            <th>{{ $lokasi->id }}</th>
                            <td>{{ $lokasi->nama_lokasi }}</td>
                            <td>
                                <a href="{{ route('lokasi.edit', $lokasi->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
