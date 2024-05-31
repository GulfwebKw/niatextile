<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class setLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( $request->routeIs([ 'home' ,'aboutUs' ,'products' ,'news'  ,'contactsUs' , 'subscribe']))
            app()->setLocale($request->cookie('locale','en'));
        else
            app()->setLocale('en');
        return $next($request);
    }
}
