<?php

use App\Http\Middleware\Test1;
use App\Http\Middleware\Test2;
use App\Http\Middleware\TestMiddleware;
use App\Http\Middleware\verifyIsAdmin;
use App\Http\Middleware\verifyIsUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [], prepend: []);
        $middleware->api(append: [], prepend: []);
        $middleware->appendToGroup('test', [
            Test1::class,
            Test2::class,
        ]);

        $middleware->alias([
            'test1' => Test1::class,
            'test2' => Test2::class,
        ]);

        $middleware->appendToGroup('roles', [
            verifyIsUser::class,
            verifyIsAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
