<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if (\Auth::user()->user_role_id == 1) {
            return $next($request);
        }

        return response()->view('errors.403', [], 403);
    }

}
