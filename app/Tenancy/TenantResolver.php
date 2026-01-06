<?php

namespace App\Tenancy;

use App\Models\Church;

class TenantResolver
{
    public static function resolve()
    {
        $host = request()->getHost();
        $parts = explode('.', $host);

        // localhost ou domínio sem subdomínio
        if (count($parts) < 3) {
            return null;
        }

        $subdomain = $parts[0];

        return Church::where('slug', $subdomain)
            ->where('active', true)
            ->first();
    }
}
