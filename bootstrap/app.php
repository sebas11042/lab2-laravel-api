<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Middleware del grupo API (incluye Sanctum y bindings)
    $middleware->group('api', [
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ]);


        // Puedes agregar middlewares globales aquí si los necesitas
        // $middleware->append(...);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
