<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (! Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        if ($user->isAdmin()) {
            return $next($request);
        }

        foreach ($roles as $role) {
            // Check if user has the role up
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        return redirect('login');
    }
}
