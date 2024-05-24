<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LocalizationController extends Controller
{
    public function switch(Request $request, $locale): RedirectResponse
    {
        if (!in_array($locale, ['en', 'ru', 'de'])) {
            abort(400, 'Invalid language');
        }
        App::setLocale($locale);
        $request->session()->put('locale', $locale);
        return redirect()->back();
    }
}

