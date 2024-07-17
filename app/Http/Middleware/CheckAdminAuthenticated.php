<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminAuthenticated

{

    /**

     * Handle an incoming request.

     *

     * @param  Request  $request

     * @param Closure $next

     * @return mixed

     */

    public function handle($request, Closure $next, $guard = null)

    {

        if (Auth::guard($guard)->check()) {

            if(auth()->user()->isAdmin())

                return $next($request);

        }

            return redirect('admin/login');

        }
}

