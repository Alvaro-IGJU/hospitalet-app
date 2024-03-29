<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $languages = ['en', 'es', 'fr', 'de']; // Idiomas admitidos por tu aplicación
        $locale = $request->server('HTTP_ACCEPT_LANGUAGE');

        // Obtenemos el primer idioma de la lista que coincida con los idiomas admitidos
        $locale = substr($locale, 0, 2);
        if (in_array($locale, $languages)) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
