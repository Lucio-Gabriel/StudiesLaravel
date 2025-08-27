<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class verifyIsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::firstOrCreate(
            ['email' => 'testeAdmin@example.com'],
            [
            'name' => 'Gabriel',
            'password' => ('123456'),
            'is_user' => true,
            'is_admin' => false,
            ]
        );

        if ($user->is_user == true) {
            dd('Bem vindo usuário...');
        }

        return $next($request);
    }
}
