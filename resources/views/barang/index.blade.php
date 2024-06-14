@extends('layouts.mainlayout')

@section('title', 'Index barang')

@section('content')
    <div class="container">
        <h1>Daftar Barang</h1>
        <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>

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

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Lokasi Cabang</th>
                    <th>Kode Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->kategoris->nama_kategori }}</td>
                        <td>{{ $item->lokasis->nama_lokasi }}</td>
                        <td>{{ $item->cabangs->nama_cabang }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>
                            <a href="{{ route('barang.show', $item->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
