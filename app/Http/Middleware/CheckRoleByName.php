<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleByName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();

        // Memeriksa apakah pengguna memiliki nama role yang diizinkan
        if ($user && $user->role && in_array($user->role->name, $roles)) {
            return $next($request);
        }

        // Jika tidak memiliki nama role yang diizinkan, kembalikan respons error
        return response()->json(['error' => 'Unauthorized'], 403);
    }   
}
