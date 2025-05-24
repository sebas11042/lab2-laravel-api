<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
    {
        return response()->json(Profesor::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|email|unique:profesors',
            'especialidad' => 'required|string',
        ]);

        $profesor = Profesor::create($request->all());

        return response()->json($profesor, 201);
    }

    public function show($id)
    {
        return response()->json(Profesor::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->update($request->all());

        return response()->json($profesor);
    }

    public function destroy($id)
    {
        Profesor::destroy($id);

        return response()->json(null, 204);
    }
}
