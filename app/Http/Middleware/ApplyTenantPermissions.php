<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplyTenantPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(auth()->user())) {
            $tenant = auth()->user()->tenants->first();
            if ($tenant) {
                if (!session('tenant_id')) {
                    session()->put('tenant_id', $tenant->id);
                }
                setPermissionsTeamId(session($tenant->id));
            }

        }
        return $next($request);
    }
}
