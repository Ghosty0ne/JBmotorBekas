<?php

use App\Http\Middleware\UpdateLastSeen;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckBlockedUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        $middleware->web(append: [
            UpdateLastSeen::class,
            CheckBlockedUser::class,
        ]);
        
        $middleware->alias([
            'admin' => CheckAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
    })->create();
