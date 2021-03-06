<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNoRecipes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (count(Auth::user()->recipes) == 0) {
            return redirect('/recipe')->with('info', 'recipes.redirect_no_recipes');
        }

        return $next($request);
    }
}
