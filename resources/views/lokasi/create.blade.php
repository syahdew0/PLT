@extends('layouts.mainlayout')

@section('title', 'Add lokasi')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="card px-5 mt-3 shadow">
                    <h1 class="text-primary pt-4 text-center mb-4">Generate Barcode in Laravel</h1>

                    <form action="lokasi" method="post">
                        @csrf
                        <label for="">Nama lokasi : </label>
                        <input type="text" class="form-control mb-3" name="nama_lokasi" required>
                        <button type="submit" class="btn btn-success col-md-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
