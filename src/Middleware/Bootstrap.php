<?php

namespace YmPhp\YmAdmin\Middleware;

use Closure;
use YmPhp\YmAdmin\Facades\Admin;
use Illuminate\Http\Request;

class Bootstrap
{
    public function handle(Request $request, Closure $next)
    {
        Admin::bootstrap();

        return $next($request);
    }
}
