<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddeware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {
       if (!auth()->guard()->check()) {
            return redirect('login');
        }

        if (!in_array(auth()->Guard::user()->role, $roles)) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    
    }
}
