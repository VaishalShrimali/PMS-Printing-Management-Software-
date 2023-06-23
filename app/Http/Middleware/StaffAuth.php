<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaffAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('STAFF_ID')) {
            return $next($request);
        } else {
            $request->session()->flash('icon', 'error');
            $request->session()->flash('msg', 'Your session has been expired');
            return redirect('/staff/login');
        }
    }
}