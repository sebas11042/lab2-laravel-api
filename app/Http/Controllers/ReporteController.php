<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Profesor;
use App\Models\Aula;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function exportarCursos()
    {
        $cursos = Curso::all();
        $pdf = Pdf::loadView('pdf.reporte_cursos', compact('cursos'));
        return $pdf->download('reporte_cursos.pdf');
    }

    public function exportarProfesores()
    {
        $profesores = Profesor::all();
        $pdf = Pdf::loadView('pdf.reporte_profesores', compact('profesores'));
        return $pdf->download('reporte_profesores.pdf');
    }

    public function exportarAulas()
    {
        $aulas = Aula::all();
        $pdf = Pdf::loadView('pdf.reporte_aulas', compact('aulas'));
        return $pdf->download('reporte_aulas.pdf');
    }
}

