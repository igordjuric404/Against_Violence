<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\AnonymousPostController;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $rolesToCheck = explode('|', $roles);
        if (!Auth::check()) {
            return redirect()->route('register');
        }
        else {
            foreach ($rolesToCheck as $r) {
                if (Auth::user()->access_level == trim($r) && (!empty($r) || $r === null)) {
                    return $next($request);
                }
            }
        }

        abort(403, 'Nemate pristup ovoj stranici.');
    }
}
