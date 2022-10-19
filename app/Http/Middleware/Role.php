<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    public function handle($request, Closure $next, $role) {
        if ($request->user()->role == $role) {
            return $next($request);
        }
        return response()->json([
            'status_code' => 500,
            'message' => 'Unauthorized'
        ]);
    }
}
