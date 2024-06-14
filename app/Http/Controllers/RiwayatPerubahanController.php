<?php

// app/Http/Controllers/RiwayatPerubahanController.php

namespace App\Http\Controllers;

use App\Models\RiwayatPerubahan;
use Illuminate\Http\Request;

class RiwayatPerubahanController extends Controller
{
    public function index()
    {
        $riwayatPerubahan = RiwayatPerubahan::all();
        return response()->json($riwayatPerubahan);
    }

    public function store(Request $request)
    {
        $riwayatPerubahan = RiwayatPerubahan::create($request->all());
        return response()->json($riwayatPerubahan, 201);
    }

    public function show($id)
    {
        $riwayatPerubahan = RiwayatPerubahan::find($id);
        return response()->json($riwayatPerubahan);
    }

    public function update(Request $request, $id)
    {
        $riwayatPerubahan = RiwayatPerubahan::find($id);
        $riwayatPerubahan->update($request->all());
        return response()->json($riwayatPerubahan);
    }

    public function destroy($id)
    {
        RiwayatPerubahan::destroy($id);
        return response()->json(null, 204);
    }
}

