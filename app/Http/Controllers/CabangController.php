<?php

namespace App\Http\Controllers;

use App\Models\cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        $cabangs = Cabang::all();
        return view('cabang.index', compact('cabangs'));
    }

    public function create()
    {
        return view('cabang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required|string|max:40',
        ]);

        Cabang::create($request->only(['nama_cabang']));

        return redirect()->route('cabang.index')->with('success', 'Lokasi created successfully');
    }

    public function edit($id)
    {
        $cabang = Cabang::findOrFail($id);
        return view('cabang.edit', compact('cabang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_cabang' => 'required|string|max:40',
        ]);

        $cabang = Cabang::findOrFail($id);
        $cabang->update($request->only(['nama_cabang']));
        $cabang->save();

        return redirect()->route('cabang.index')->with('success', 'lokasi cabang updated successfully');
    }
}
