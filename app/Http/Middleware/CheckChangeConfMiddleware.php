<?php

namespace App\Http\Middleware;


use Illuminate\Http\Response;
use Closure;
use Auth;

class CheckChangeConfMiddleware
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
        if(Auth::user()->changeAddress == 1 && !is_null(Auth::user()->token))
            return new Response(view('waiting_change'));
        return $next($request);
    }
}
