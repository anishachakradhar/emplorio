<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class HrMiddleware
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
      //  
      if(Auth::check() && auth()->user()->is_admin == 1)
          {
            return $next($request);
          }
            return redirect('login')->with('error','You have not admin access');
    }
}
