<?php

namespace App\Http\Middleware;

use Closure;

class MedicoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role == 'medico')
            return $next($request);

        return redirect('/');
    }
}
