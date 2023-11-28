<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRefererRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the user came from the specified route
        $referer = $request->headers->get('referer');
        $allowedReferer = url('/contact');

        if ($referer !== $allowedReferer) {
            return redirect('/contact')->with('error', 'Invalid access');
        }

        return $next($request);
    }
}
