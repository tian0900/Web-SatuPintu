<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckRoleByName
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();
        Log::info('User Data', ['user' => $user]);

        if (!$user) {
            Log::warning('Unauthorized access attempt: No user found');
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $userRoleName = $user->role->name ?? null;
        Log::info('User Role', ['role_name' => $userRoleName]);

        if ($userRoleName && in_array($userRoleName, $roles)) {
            return $next($request);
        }

        Log::warning('Unauthorized access attempt: Invalid role', ['role_name' => $userRoleName]);
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
