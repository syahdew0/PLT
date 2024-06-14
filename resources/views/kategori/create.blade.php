@extends('layouts.mainlayout')

@section('title', 'Add Kategori')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="card px-5 mt-3 shadow">
                    <h1 class="text-primary pt-4 text-center mb-4">Generate Barcode in Laravel</h1>

                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kategori">Nama Kategori : </label>
                            <input type="text" class="form-control mb-3" name="nama_kategori" required>
                            {{-- <button type="submit" class="btn btn-success col-md-3">Submit</button> --}}
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
