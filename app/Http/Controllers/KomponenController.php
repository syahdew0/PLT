<?php

// app/Http/Controllers/KomponenController.php

namespace App\Http\Controllers;

use App\Models\Komponen;
use Illuminate\Http\Request;

class KomponenController extends Controller
{
    public function index()
    {
        $komponen = Komponen::all();
        return response()->json($komponen);
    }

    public function store(Request $request)
    {
        $komponen = Komponen::create($request->all());
        return response()->json($komponen, 201);
    }

    public function show($id)
    {
        $komponen = Komponen::find($id);
        return response()->json($komponen);
    }

    public function update(Request $request, $id)
    {
        $komponen = Komponen::find($id);
        $komponen->update($request->all());
        return response()->json($komponen);
    }

    public function destroy($id)
    {
        Komponen::destroy($id);
        return response()->json(null, 204);
    }
}

