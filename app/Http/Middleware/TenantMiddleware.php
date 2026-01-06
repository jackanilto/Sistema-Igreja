<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Church;

class TenantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        // Ignora domínio principal
        if ($host === 'localhost' || $host === '127.0.0.1') {
            return $next($request);
        }

        $parts = explode('.', $host);

        if (count($parts) < 2) {
            abort(404, 'Igreja não identificada');
        }

        $subdomain = $parts[0];

        $church = \App\Models\Church::where('subdomain', $subdomain)
            ->where('active', true)
            ->first();

        if (!$church) {
            abort(404, 'Igreja não encontrada');
        }

        app()->instance('church', $church);

        return $next($request);
    }
}
