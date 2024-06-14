<?php

namespace App\Http\Controllers;
// app/Http/Controllers/PerawatanController.php

namespace App\Http\Controllers;

use App\Models\Perawatan;
use App\Models\Barang;
use App\Models\Material;
use Illuminate\Http\Request;

class PerawatanController extends Controller
{
    public function create($barang)
{
     // Tambahkan ini untuk melihat nilai parameter
    $barang = Barang::findOrFail($barang);
    $materials = Material::all();
    return view('perawatan.create', compact('barang', 'materials'));
}
    

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'jenis_perawatan' => 'required|string|max:255',
            'tanggal_perawatan' => 'required|date',
            'keterangan' => 'nullable|string',
            'materials' => 'nullable|array',
            'materials.*.id' => 'required|exists:materials,id',
            'materials.*.quantity' => 'required|integer|min:1',
        ]);

        $perawatan = new Perawatan();
        $perawatan->barang_id = $request->barang_id;
        $perawatan->jenis_perawatan = $request->jenis_perawatan;
        $perawatan->tanggal_perawatan = $request->tanggal_perawatan;
        $perawatan->keterangan = $request->keterangan;
        $perawatan->save();

        if ($request->has('materials')) {
            foreach ($request->materials as $material) {
                $perawatan->materials()->attach($material['id'], ['quantity' => $material['quantity']]);
            }
        }

        return redirect()->route('barang.show', $request->barang_id)->with('success', 'Perawatan berhasil ditambahkan');
    }
}
