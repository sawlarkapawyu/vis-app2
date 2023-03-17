<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;

use Illuminate\Support\Facades\URL;
// use Illuminate\Support\Facades\App;
// use Illuminate\Foundation\Application;

class SetDefaultLocaleForUrls
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle($request, Closure $next)
    {
        \App::setLocale($request->lang);

        // URL::defaults(['lang' => App::getLocale()]); 

        return $next($request);
    }
    
}
