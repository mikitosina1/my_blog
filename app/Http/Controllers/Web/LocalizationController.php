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
    )
    {
    }

    public function switch(
        Request $request,
        string  $locale
    ): RedirectResponse
    {
        $this->action->execute($request, $locale);

        $redirect = $request->query('redirect');

        if (
            is_string($redirect) &&
            str_starts_with($redirect, '/') &&
            !str_starts_with($redirect, '//')
        ) {
            return redirect()->to($redirect);
        }

        return redirect()->back();
    }
}
