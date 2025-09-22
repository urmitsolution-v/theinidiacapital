<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CuttingMaster
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && (Auth::user()->role == "superadmin" || (Auth::user()->role == "team" || Auth::user()->role_type == "cutting_master" && Auth::user()->is_block == "N"))) {
            return $next($request);
        } else {
            return redirect()->route('adminlogin');
        }

    }
}
