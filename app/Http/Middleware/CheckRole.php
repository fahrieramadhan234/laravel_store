<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckRole
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
        // dd($request->user()->role);
        if ($request->user()->role != null) {
            return $next($request);
        }

        return redirect('/admin/login');
    }
}
