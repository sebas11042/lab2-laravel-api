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
        $cursos = Curso::all();

        // Obtener profesores y aulas y organizarlos por ID para acceso rápido
        $profesores = Profesor::all()->keyBy('id');
        $aulas = Aula::all()->keyBy('id');

        // Agregar los nombres de profesor y aula a cada curso
        $cursos = $cursos->map(function ($curso) use ($profesores, $aulas) {
            $curso->nombre_profesor = $profesores[$curso->profesor_id]->nombre ?? 'Sin asignar';
            $curso->nombre_aula = $aulas[$curso->aula_id]->nombre ?? 'Sin asignar';
            return $curso;
        });

        return response()->json($cursos);
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
