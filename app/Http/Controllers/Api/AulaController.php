<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        return response()->json(Aula::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'ubicacion' => 'required|string',
            'capacidad' => 'required|integer|min:1',
        ]);

        $aula = Aula::create($request->all());

        return response()->json($aula, 201);
    }

    public function show($id)
    {
        return response()->json(Aula::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $aula = Aula::findOrFail($id);
        $aula->update($request->all());

        return response()->json($aula);
    }

    public function destroy($id)
    {
        Aula::destroy($id);

        return response()->json(null, 204);
    }
}
