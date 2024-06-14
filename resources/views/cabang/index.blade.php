@extends('layouts.mainlayout')

@section('title', 'Index lokasi Cabang')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <h1 class="text-danger pt-4 text-center mb-4">List of lokasi_cabang</h1>
            <hr>
            <div class="pb-2">
                <a href="{{ route('cabang.create') }}" class="btn btn-success">New lokasi Cabang</a>

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
                        <th scope="col">Nama lokasi Cabang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cabangs as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->nama_cabang }}</td>
                        <td>
                            <a href="{{ route('cabang.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
