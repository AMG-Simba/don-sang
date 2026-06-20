<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $role = Auth::user()->role;
        if ($role !== 'admin' && $role !== 'medecin' && $role !== 'agent') {
            return redirect()->route('accueil')->with('erreur', 'ما عندكش الصلاحية للدخول لهاد الصفحة');
        }
        return $next($request);
    }
}
