<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $supportedLocales = ['en', 'ru', 'de'];

        if (!$request->session()->has('locale')) {
            $preferredLocale = $request->getPreferredLanguage($supportedLocales);
            $request->session()->put('locale', $preferredLocale);
        }

        $locale = $request->session()->get('locale');

        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
