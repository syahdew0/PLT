@extends('layouts.mainlayout')

@section('title', 'Detail Barang')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="card px-5 mt-3 shadow">
                    <h1 class="text-primary pt-4 text-center mb-4">Detail Barang</h1>

                    <div class="content-wrapper">
                        <div class="container-fluid">
                            <div class="card shadow mb-4">
                                <h5 class="card-header">Detail Barang</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0"
                                            style="table-layout: fixed;">
                                            <tbody>
                                                <tr>
                                                    <td>KODE BARANG &emsp;&emsp; :</td>
                                                    <td style="display: flex; align-items: center;">
                                                        <span>
                                                            {!! DNS1D::getBarcodeHTML($barang->kode_barang, 'UPCA', 2, 50) !!}
                                                            p- {{ $barang->kode_barang }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>NAMA BARANG &emsp;&emsp; :</td>
                                                    <td>{{ $barang->nama_barang }}</td>
                                                </tr>
                                                <tr>
                                                    <td>LOKASI / CABANG &emsp; :</td>
                                                    <td>{{ $barang->lokasis->nama_lokasi }} /
                                                        {{ $barang->cabangs->nama_cabang }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <table class="table table-bordered" width="100%" cellspacing="0"
                                        style="table-layout: fixed;">
                                        <tbody>
                                            <tr>
                                                <td>DIBUAT OLEH &emsp;&emsp; : &emsp; </td>
                                                <td style="display: flex; align-items: center;">
                                                    <span>KABID PEMELIHARAAN MEKANIKAL & ELEKTRIKAL</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>DISETUJUI OLEH &emsp; : </td>
                                                <td>KADIV . PLT</td>
                                            </tr>
                                            <tr>
                                                <td>PADA TANGGAL &emsp; : &emsp; </td>
                                                <td>{{ $barang->tanggal }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar {{ $barang->nama_barang }}" style="max-width: 200px; height: auto;">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('perawatan.create', ['barang' => $barang->id]) }}" class="btn btn-primary">Buat Perawatan</a>


                                    <form action="{{ route('barang.delete', $barang->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
