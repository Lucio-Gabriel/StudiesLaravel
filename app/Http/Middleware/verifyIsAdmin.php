<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class verifyIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userAdmin = User::firstOrCreate(
            ['email' => 'teste@example.com'],
            [
            'name' => 'Gabriel',
            'password' => ('123456'),
            'is_user' => false,
            'is_admin' => true,
            ]
        );


        if ($userAdmin->is_admin == true) {
            dd('Bem vindo admin...');
        }

        return $next($request);
    }
}
