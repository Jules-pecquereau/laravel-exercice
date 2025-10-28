<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class langue_Middleware
{

    public function handle($request, Closure $next)
    {

        $locale = Session::get('lang', 'fr');
        App::setLocale($locale);


        return $next($request);
    }
}
