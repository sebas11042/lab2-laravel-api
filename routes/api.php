<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfesorController;
use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\AulaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ReporteController;

Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
});

// RUTAS PÚBLICAS (sin token)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/reporte/cursos', [ReporteController::class, 'exportarCursos']);
Route::get('/reporte/profesores', [ReporteController::class, 'exportarProfesores']);
Route::get('/reporte/aulas', [ReporteController::class, 'exportarAulas']);


// RUTAS PROTEGIDAS (requieren login con Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    // CRUDs protegidos
    Route::apiResource('profesores', ProfesorController::class);
    Route::apiResource('cursos', CursoController::class);
    Route::apiResource('aulas', AulaController::class);

    // Reportes PDF protegidos
 
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
