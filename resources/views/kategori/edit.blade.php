@extends('layouts.mainlayout')

@section('title', 'Edit Kategori')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="card px-5 mt-3 shadow">
                    <h1 class="text-primary pt-4 text-center mb-4">Edit Kategori</h1>

                    <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                        @csrf
                        @method('PUT') <!-- Spoofing the PUT method -->
                        <div class="mb-3">
                            <label for="nama_kategori">Nama Kategori : </label>
                            <input type="text" class="form-control mb-3" name="nama_kategori"
                                value="{{ $kategori->nama_kategori }}" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-md-3">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
