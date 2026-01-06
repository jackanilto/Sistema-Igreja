<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\TenantMiddleware;

return Application::configure(basePath: dirname(__DIR__))

    ->withMiddleware(function (Middleware $middleware) {
        // Middleware global (roda em todas as requisições)
        $middleware->append(TenantMiddleware::class);

        // Alias para uso em rotas
        $middleware->alias([
            'tenant' => TenantMiddleware::class,
        ]);
    })

    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })

    ->create();