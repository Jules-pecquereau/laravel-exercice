<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class langue_Middleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = Session::get('lang', 'fr');
        App::setLocale($locale);

        return $next($request);
    }
}
