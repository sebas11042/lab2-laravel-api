<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return response()->json(Curso::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string|unique:cursos',
            'creditos' => 'required|integer|min:1',
        ]);

        $curso = Curso::create($request->all());

        return response()->json($curso, 201);
    }

    public function show($id)
    {
        return response()->json(Curso::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());

        return response()->json($curso);
    }

    public function destroy($id)
    {
        Curso::destroy($id);

        return response()->json(null, 204);
    }
}
