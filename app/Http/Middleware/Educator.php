<?php

namespace App\Http\Middleware;

use App\Src\Educator\Educator as EducatorClass;
use Closure;

class Educator
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
        if (auth()->check() && is_a(auth()->user()->getType(),EducatorClass::class)) {
            dd(auth()->user()->getType());
            return $next($request);
        } elseif(auth()->check()) {
            return redirect()->to('/home');
        }

        return redirect()->to('/auth/login');
    }
}
