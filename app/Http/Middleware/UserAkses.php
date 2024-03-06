<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $userRole = auth()->user()->role;
        Log::info("Role pengguna saat ini: $userRole, Peran yang diharapkan: " . implode(', ', $roles));

        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        return response()->json(['error' => 'Anda tidak diperbolehkan mengakses halaman ini. Periksa peran pengguna Anda.'], 403);
    }

}
