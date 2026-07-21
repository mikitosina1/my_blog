<?php

namespace App\Actions\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SwitchLocaleAction
{
    public function execute(Request $request, string $locale): void
    {
        App::setLocale($locale);

        $request->session()->put('locale', $locale);
    }
}
