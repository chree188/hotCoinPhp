<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class ChangeLang
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
//        if($request->session()->has('oex_lan')){
//            App::setLocale(session('oex_lan'));
//        }
        if(isset($_COOKIE['oex_lan'])){
            $lan =  $_COOKIE['oex_lan'] == 'en_US' ? 'en':'cn';
            App::setLocale($lan);
        }
        return $next($request);
    }

}
