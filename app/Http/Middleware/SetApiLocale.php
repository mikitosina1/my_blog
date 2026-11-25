<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetApiLocale
{
    public function handle($request, Closure $next)
    {
        $supportedLocales = ['en', 'ru', 'de'];
        $locale = $request->header('Accept-Language')
            ? $request->getPreferredLanguage($supportedLocales)
            : null;

        if ($locale === null && $request->hasSession()) {
            $locale = $request->session()->get('locale');
        }

        $locale ??= config('app.locale');

        if (in_array($locale, $supportedLocales, true)) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
