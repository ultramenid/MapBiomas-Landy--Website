<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class setLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lang = $request->route('lang') ?? $request->lang;
        $allowed = ['id', 'en'];

        if (!in_array($lang, $allowed, true)) {
            $lang = config('app.fallback_locale', 'en');
        }

        app()->setLocale($lang);
        return $next($request);
    }
}
