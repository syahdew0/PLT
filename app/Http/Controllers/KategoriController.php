<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function create() {
        return view('kategori.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create($request->only(['nama_kategori']));
        
        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->only(['nama_kategori']));
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
