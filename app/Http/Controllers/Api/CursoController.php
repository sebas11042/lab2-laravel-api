<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Profesor;
use App\Models\Aula;

class CursoController extends Controller
{
    public function index()
    {
        // Cargar cursos con las relaciones profesor y aula
        $cursos = Curso::with('profesor', 'aula')->get();

        // Transformar datos para incluir solo los campos que queremos mostrar
        $cursos = $cursos->map(function ($curso) {
            return [
                'id' => $curso->id,
                'nombre' => $curso->nombre,
                'codigo' => $curso->codigo,
                'creditos' => $curso->creditos,
                'profesor_id' => $curso->profesor_id,
                'aula_id' => $curso->aula_id,
                'nombre_profesor' => $curso->profesor->nombre ?? 'Sin asignar',
                'nombre_aula' => $curso->aula->nombre ?? 'Sin asignar',
            ];
        });

        return response()->json($cursos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string|unique:cursos',
            'creditos' => 'required|integer|min:1',
            'profesor_id' => 'nullable|exists:profesores,id',
            'aula_id' => 'nullable|exists:aulas,id',
        ]);

        $curso = Curso::create($request->all());

        return response()->json($curso, 201);
    }

    public function show($id)
    {
        $curso = Curso::with('profesor', 'aula')->findOrFail($id);

        return response()->json([
            'id' => $curso->id,
            'nombre' => $curso->nombre,
            'codigo' => $curso->codigo,
            'creditos' => $curso->creditos,
            'profesor_id' => $curso->profesor_id,
            'aula_id' => $curso->aula_id,
            'nombre_profesor' => $curso->profesor->nombre ?? 'Sin asignar',
            'nombre_aula' => $curso->aula->nombre ?? 'Sin asignar',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string|unique:cursos,codigo,' . $id,
            'creditos' => 'required|integer|min:1',
            'profesor_id' => 'nullable|exists:profesores,id',
            'aula_id' => 'nullable|exists:aulas,id',
        ]);

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
