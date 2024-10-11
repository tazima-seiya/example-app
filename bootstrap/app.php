<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //$middleware->append(\App\Http\Middleware\SampleMiddleware::class); // グローバルミドルウェア
        //
        $middleware->redirectGuestsTo('/login'); // ログインしていない場合の遷移先
        $middleware->redirectUsersTo('/tweet'); // ログインしていた場合の遷移先
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
