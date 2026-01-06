<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserBelongsToChurch
{
    public function handle(Request $request, Closure $next)
    {
        $church = app('church'); // vem do TenantMiddleware
        $user = Auth::user();

        // Se não estiver logado, deixa o auth lidar
        if (!$user) {
            return $next($request);
        }

        // Usuário não pertence à igreja do subdomínio
        if ($user->church_id !== $church->id) {
            Auth::logout();

            abort(403, 'Você não pertence a esta igreja');
        }

        return $next($request);
    }
}
