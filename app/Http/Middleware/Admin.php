<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->admin == '1') {
            return $next($request);
        } elseif(auth()->check()) {
            return redirect()->to('/home');
        }
        return redirect()->to('/auth/login');
    }
}
