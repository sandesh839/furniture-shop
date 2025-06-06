<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //admin vanda aru le access garna namilna ko lagi banako
        if(Auth::user()->role == 'admin'){
        return $next($request);
        }
        else{
            //return abort(403);
            return redirect()->route('home')->with('success','No enough permission');
        }
    }
}
