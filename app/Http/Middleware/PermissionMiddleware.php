<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $permission, $guard = null)
    {
       
        $authGuard = app('auth')->guard($guard);

        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        if($request->user()->isSuperAdmin){
            return $next($request);
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);
        

        foreach ($permissions as $permission)
        {
            if($request->user()->RoleHasPermission($permission))
            {
                return $next($request);
            } 
        }

        throw UnauthorizedException::forPermissions($permissions);
    }

    /*public function handle($request, Closure $next, $permission, $guard = null)
    {
       
        $authGuard = app('auth')->guard($guard);

        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

            $roles=$request->user()->roles;

            $allPermission=$request->user()->getAllPermissionsViaRole($roles);

            $allPermissionArray = $allPermission->pluck('slug')->toArray();



        foreach ($permissions as $permission) {
            
            if( in_array($permission,$allPermissionArray) ){
                    return $next($request);
            }

        }

    
            //$re=$request->user()->hasPermissionThroughRole($allPermission); 

            foreach ($allPermission as $key => $all_permission)
            {
                    $check=$request->user()->hasPermissionThroughRole($all_permission);    
                    if($check){
                        return $next($request);           
                    }

                              
            }

            if($request->user()->hasPermissionThroughRole('products-create'))
            {
                 return $next($request);
            }


        foreach ($permissions as $permission) {
            
            if( (in_array($permission,$allPermission)) || ($authGuard->user()->can($permission)) ){
                   return $next($request);
            }

        }

        throw UnauthorizedException::forPermissions($permissions);
    

    }*/

}
