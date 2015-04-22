<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class IsSuperUser {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()) {
            return redirect()->guest('auth/login');
        }
        elseif(!Auth::user()->isSuper())
        {
            session()->flash('flash_message', 'You do not have authorization to view this page.');
            return redirect('/');
        }

        return $next($request);
    }
}
