<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            if (
                $request->routeIs('core.*') ||
                $request->routeIs('administrator.*') ||
                $request->routeIs('auth.*') ||
                $request->segment(1) == 'core' ||
                $request->segment(1) == 'administrator' ||
                $request->segment(1) == 'auth'
            ) {
                return route('auth.login');
            }

            if ($request->routeIs('customer.*')) {
                return route('customer.login');
            }

            if (
                $request->routeIs('front.*')
            ) {
                return route('front.login');
            }

            // if ($request->routeIs('mentor.*')) {
            //     return route('mentor.login');
            // }

            abort(403);
        }

        return $request;
    }
}
