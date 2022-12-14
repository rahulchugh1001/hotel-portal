<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Exceptions\UnauthorizedException;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role, $permission=null,$guard = null)
    {
        $authGuard = \Auth::guard($guard);

        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }
       
        if($request->user()->isSuperAdmin){
            return $next($request);
        }

         $roles = is_array($role)
            ? $role
            : explode('|', $role);

        foreach ($roles as $role) {
            if($request->user()->hasRole($role)) {
                return $next($request);
            }
        }

        throw UnauthorizedException::forRoles($roles);
        
    }


    /* public function handle($request, Closure $next, $role, $guard = null)
    {
        $authGuard = Auth::guard($guard);

        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (! $authGuard->user()->hasAnyRole($roles)) {
            throw UnauthorizedException::forRoles($roles);
        }

        return $next($request);



        //print_r($request->user());

        //print_r($permission);
        
   /*     if($request->user()->hasRole($role)){
            
            $roles=$request->user()->roles;
            foreach ($roles as $key => $role_v) {
                $permissionData=$role_v->permissions->toArray();

                print_r($permissionData);

            }
          //  print_r($roles);
        }

        exit;

    }*/
}
