<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Roles as Middleware;
use Illuminate\Support\Facades\Auth;

class Roles
{

    public function handle($request, Closure $next, String $roles)
    {
        if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
            return redirect('/home');

        $user = Auth::user();
        if ($user->roles == $roles)
            return $next($request);

        return redirect('/home');
    }
}
