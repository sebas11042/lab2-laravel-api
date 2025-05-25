<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfesorController;
use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\AulaController;
use App\Http\Controllers\Api\AuthController;

Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
});

// Rutas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('profesores', ProfesorController::class);
    Route::apiResource('cursos', CursoController::class);
    Route::apiResource('aulas', AulaController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
