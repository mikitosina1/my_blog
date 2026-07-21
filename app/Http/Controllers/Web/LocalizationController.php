<?php

namespace App\Http\Controllers\Web;

use App\Actions\Web\SwitchLocaleAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function __construct(
        private readonly SwitchLocaleAction $action,
    ) {}

    public function switch(Request $request, $locale): RedirectResponse
    {
        $this->action->execute($request, $locale);

        return redirect()->back();
    }
}
