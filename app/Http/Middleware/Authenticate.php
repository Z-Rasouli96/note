<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Exceptions\AuthException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
       
        if (auth()->user()) {
            return $next($request);
        }
        else{
            throw new AuthException("Authenticate error");
        }
    }
}
