<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfesorController;
use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\AulaController;


Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
});
Route::apiResource('profesores', ProfesorController::class);
Route::apiResource('cursos', CursoController::class);
Route::apiResource('aulas', AulaController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

