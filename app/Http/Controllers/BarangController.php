<?php


namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\kategori;
use App\Models\lokasi;
use App\Models\cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with(['kategoris', 'lokasis', 'cabangs'])->get();
        // dd($barang);
        // return response()->json($barang);
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        $lokasi = Lokasi::all();
        $cabang = Cabang::all();
        $kategori = kategori::all();

        return view('barang.create', compact('lokasi', 'cabang', 'kategori'));
    }

    public function store(Request $request)
    {

        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'nullable',
            'nama_lokasi' => 'nullable',
            'nama_cabang' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimum 2MB
            'komponens_json' => 'required|string', // Validasi untuk JSON komponen
        ]);

        // Proses penyimpanan gambar jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName(); // Gunakan nama asli file
            $filePath = $file->storeAs('gambar', $fileName, 'public'); // Simpan file ke storage/gambar
        } else {
            $filePath = null; // Jika tidak ada gambar diunggah, atur nilai null
        }

        // Generate nomor barang acak
        $number = mt_rand(10000000, 99999999);
        while ($this->barangCodeExists($number)) {
            $number = mt_rand(10000000, 99999999);
        }

        // Simpan data barang ke dalam database
        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori = $request->kategori;
        $barang->nama_lokasi = $request->nama_lokasi;
        $barang->nama_cabang = $request->nama_cabang;
        $barang->kode_barang = $number;
        $barang->gambar = $filePath;
        $barang->tanggal = now(); // Tanggal sekarang
        $barang->save();

        // Tambahkan komponens ke barang
        $komponens = json_decode($request->komponens_json, true);
        if (!empty($komponens)) {
            foreach ($komponens as $komponen) {
                $barang->komponens()->create($komponen);
            }
        }

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function barangCodeExists($number)
    {
        return Barang::where('kode_barang', $number)->exists();
    }

    public function show($id)
    {
        $barang = Barang::find($id);
        // return response()->json($barang);
        return view('barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all(); // Ganti dengan model dan query untuk mengambil kategori
        $lokasi = Lokasi::all(); // Ganti dengan model dan query untuk mengambil lokasi
        $cabang = Cabang::all(); // Ganti dengan model dan query untuk mengambil cabang

        return view('barang.edit', compact('barang', 'kategori', 'lokasi', 'cabang'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'nullable',
            'nama_lokasi' => 'nullable',
            'lokasi_cabang' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimum 2MB
            'komponens.*.nama_komponen' => 'required|string|max:255',
            'komponens.*.keterangan' => 'nullable|string',
        ]);

        // Proses penyimpanan gambar jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName(); // Gunakan nama asli file
            $filePath = $file->storeAs('gambar', $fileName, 'public'); // Simpan file ke storage/gambar
        } else {
            $filePath = null; // Jika tidak ada gambar diunggah, atur nilai null
        }

        // Ambil data barang yang akan diupdate
        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori = $request->kategori;
        $barang->nama_lokasi = $request->nama_lokasi;
        $barang->lokasi_cabang = $request->lokasi_cabang;
        
        // Update gambar jika ada yang diunggah
        if ($filePath) {
            $barang->gambar = $filePath;
        }

        // Simpan perubahan data barang
        $barang->save();

        // Update komponen barang
        if ($request->has('komponens')) {
            // Hapus semua komponen yang terkait dengan barang ini
            $barang->komponens()->delete();

            // Tambahkan kembali komponen-komponen yang baru
            foreach ($request->komponens as $komponen) {
                $barang->komponens()->create([
                    'nama_komponen' => $komponen['nama_komponen'],
                    'keterangan' => $komponen['keterangan'],
                ]);
            }
        }

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
