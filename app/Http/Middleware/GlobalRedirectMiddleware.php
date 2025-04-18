<?php

namespace App\Http\Middleware;

use App\Models\UrlRedirect;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GlobalRedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $currentUrl = $request->path();

        $redirect = UrlRedirect::where('status', 'published')
        ->where('from_url', $currentUrl)
            ->first();
        if ($redirect && $redirect != null) {
            return redirect($redirect->to_url);
        }
        return $next($request);
    }
}
