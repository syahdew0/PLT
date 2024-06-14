@extends('layouts.mainlayout')

@section('title', 'Edit lokasi')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="card px-5 mt-3 shadow">
                    <h1 class="text-primary pt-4 text-center mb-4">Edit lokasi</h1>

                    <form action="{{ route('lokasi.update', $lokasi->id) }}" method="post">
                        @csrf
                        @method('PUT') <!-- Spoofing the PUT method -->
                        <label for="nama_lokasi">Nama lokasi : </label>
                        <input type="text" class="form-control mb-3" name="nama_lokasi" value="{{ $lokasi->nama_lokasi }}" required>
                        <button type="submit" class="btn btn-success col-md-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
