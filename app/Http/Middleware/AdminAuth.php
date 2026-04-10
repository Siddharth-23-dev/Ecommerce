<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (! Auth::check() || ! Auth::user()->isAdmin() || ! Auth::user()->isSuperAdmin) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }

}
