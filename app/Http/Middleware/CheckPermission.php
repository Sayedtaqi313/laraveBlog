<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
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
        if(auth()->user()->role->name === "admin"){
            return $next($request);
        }
        $route = $request->route()->getName();
        $permission_arr = auth()->user()->role->permissions->toArray();
        foreach($permission_arr as $permission) {
            if($route == $permission['name']){
                return $next($request);
            }
        }
        return abort(403,'access denied | Uauthorized');
    }
}
