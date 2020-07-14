<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class middlewareABM
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
        $usuarioLog = Auth::user();
        if($usuarioLog["name"] != "Admin" && $usuarioLog["name"] != "admin"){
            return redirect('/inicio');
        }
        return $next($request);
    }
}
