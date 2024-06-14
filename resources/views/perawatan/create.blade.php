<!-- resources/views/perawatan/create.blade.php -->

@extends('layouts.mainlayout')

@section('title', 'Buat Perawatan')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="card px-5 mt-3 shadow">
                    <h1 class="text-primary pt-4 text-center mb-4">Buat Perawatan untuk {{ $barang->nama_barang}}</h1>

                    <div class="content-wrapper">
                        <form action="{{ route('perawatan.store', ['barang' => $barang->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="barang_id" value="{{ $barang->id }}">

                            <div class="form-group">
                                <label for="jenis_perawatan">Jenis Perawatan</label>
                                <input type="text" class="form-control" id="jenis_perawatan" name="jenis_perawatan" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_perawatan">Tanggal Perawatan</label>
                                <input type="date" class="form-control" id="tanggal_perawatan" name="tanggal_perawatan" required>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                            </div>

                            <h5 class="card-header">Material</h5>
                            <div id="materials-container">
                                <div class="form-group">
                                    <label for="materials[0][id]">Material</label>
                                    <select class="form-control" name="materials[0][id]" required>
                                        <option selected="" hidden="">Pilih Material</option>
                                        @foreach ($materials as $material)
                                            <option value="{{ $material->id }}">{{ $material->nama_material }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="materials[0][quantity]">Quantity</label>
                                    <input type="number" class="form-control" name="materials[0][quantity]" required>
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary" onclick="addMaterial()">Tambah Material</button>

                            <button type="submit" class="btn btn-primary">Simpan Perawatan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let materialIndex = 1;

        function addMaterial() {
            const container = document.getElementById('materials-container');
            const newMaterial = `
                <div class="form-group">
                    <label for="materials[${materialIndex}][id]">Material</label>
                    <select class="form-control" name="materials[${materialIndex}][id]" required>
                        <option selected="" hidden="">Pilih Material</option>
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->nama_material }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="materials[${materialIndex}][quantity]">Quantity</label>
                    <input type="number" class="form-control" name="materials[${materialIndex}][quantity]" required>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newMaterial);
            materialIndex++;
        }
    </script>
@endsection
