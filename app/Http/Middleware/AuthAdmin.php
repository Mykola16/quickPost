<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if(session('utype') === 'ADM'){
            return $next($request);
        } else {
            session()->flush();
            return redirect()->route('login');
        }
    }
}
