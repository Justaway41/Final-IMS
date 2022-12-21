<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnabledIpMiddleware
{

    public $enableIp = "192.168.0.201";

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->ip() == $this->enableIp) {
            return $next($request);
        }
        abort(403, "You are restricted to access the site.");
    }
}
