<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class admincheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$name): Response
    {
        if(auth()->user()->name!=$name){
            return response()->json([
                'message'=>'not of you permission'
            ]);
        }
        return $next($request);
    }
}