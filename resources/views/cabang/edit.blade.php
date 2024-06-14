@extends('layouts.mainlayout')

@section('title', 'Edit lokasi Cabang')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="card px-5 mt-3 shadow">
                    <h1 class="text-primary pt-4 text-center mb-4">Edit lokasi Cabang</h1>

                    <form action="{{ route('cabang.update', $cabang->id) }}" method="post">
                        @csrf
                        @method('PUT') <!-- Spoofing the PUT method -->
                        <label for="nama_cabang">Nama lokasi Cabang </label>
                        <input type="text" class="form-control mb-3" name="nama_lokasi" value="{{ $cabang->nama_cabang }}" required>
                        <button type="submit" class="btn btn-success col-md-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
