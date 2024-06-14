<?php

namespace App\Http\Controllers;

use App\Models\lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index() {
        $lokasis = Lokasi::all();
        return view('lokasi.index', compact('lokasis'));
    }

    public function create() {
        return view('lokasi.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
        ]);

        Lokasi::create($request->only(['nama_lokasi']));
        
        return redirect()->route('lokasi.index')->with('success', 'Lokasi created successfully');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($request->only(['nama_lokasi']));
        $lokasi->save();

        return redirect()->route('lokasi.index')->with('success', 'lokasi updated successfully');
    }
}
