@extends('layouts.mainlayout')

@section('title', 'Edit Barang')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Edit Barang</h2>
                        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card shadow px-md-4">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori" required>
                                        <option selected="" hidden="">Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $barang->kategori) selected @endif>{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lokasi">Lokasi</label>
                                    <select class="form-control" id="nama_lokasi" name="nama_lokasi" required>
                                        <option selected="" hidden="">Pilih Lokasi</option>
                                        @foreach ($lokasi as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $barang->nama_lokasi) selected @endif>{{ $item->nama_lokasi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_cabang">Lokasi Cabang</label>
                                    <select class="form-control" id="lokasi_cabang" name="lokasi_cabang" required>
                                        <option selected="" hidden="">Pilih Lokasi Cabang</option>
                                        @foreach ($cabang as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $barang->lokasi_cabang) selected @endif>{{ $item->nama_cabang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" name="gambar" class="form-control" id="gambar">
                                </div>

                                <div class="card shadow px-md-4">
                                    <h5 class="card-header">Set Data Komponen Barang</h5>
                                    <div id="komponens-container">
                                        @foreach ($barang->komponens as $index => $komponen)
                                        <div class="form-group">
                                            <label for="komponens[{{ $index }}][nama_komponen]">Nama Komponen:</label>
                                            <input type="text" class="form-control" name="komponens[{{ $index }}][nama_komponen]" value="{{ $komponen->nama_komponen }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="komponens[{{ $index }}][keterangan]">Keterangan:</label>
                                            <input type="text" class="form-control" name="komponens[{{ $index }}][keterangan]" value="{{ $komponen->keterangan }}">
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="addKomponen()">Tambah Komponen</button>
                                </div>

                                <input type="hidden" id="komponens_json" name="komponens_json" value="{{ $barang->komponens }}">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var komponenArray = @json($barang->komponens); // Initialize component array with existing data

    function addKomponen() {
        var namaKomponen = document.getElementById('nama_komponen').value;
        var keterangan = document.getElementById('keterangan').value;

        if (!namaKomponen) {
            alert("Nama komponen tidak boleh kosong!");
            return;
        }

        var komponenExists = komponenArray.some(function(item) {
            return item.nama_komponen === namaKomponen;
        });

        if (komponenExists) {
            alert("Nama komponen sudah ada dalam daftar!");
            return;
        }

        var komponen = {
            'nama_komponen': namaKomponen,
            'keterangan': keterangan
        };

        komponenArray.push(komponen);

        var newRow = `<tr><td>${namaKomponen}</td><td>${keterangan}</td><td><button class='btn btn-danger btn-sm' onclick='deleteRow(this, "${namaKomponen}")'>Hapus</button></td></tr>`;
        document.getElementById('komponenTableBody').innerHTML += newRow;

        // Clear input fields
        document.getElementById('nama_komponen').value = '';
        document.getElementById('keterangan').value = '';

        // Update hidden input with JSON data
        document.getElementById('komponens_json').value = JSON.stringify(komponenArray);
    }

    function deleteRow(button, namaKomponen) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);

        komponenArray = komponenArray.filter(function(item) {
            return item.nama_komponen !== namaKomponen;
        });

        // Update hidden input with JSON data
        document.getElementById('komponens_json').value = JSON.stringify(komponenArray);
    }
</script>
@endsection
