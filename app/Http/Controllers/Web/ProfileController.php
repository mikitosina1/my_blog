<?php

namespace App\Http\Controllers\Web;

use App\Actions\Profile\DeleteProfileAction;
use App\Actions\Profile\UpdateProfileAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\DeleteProfileRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @return View
     */
    public function edit(): View
    {
        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param ProfileUpdateRequest $request
     * @param UpdateProfileAction $action
     * @return RedirectResponse
     */
    public function update(
        ProfileUpdateRequest $request,
        UpdateProfileAction $action,
    ): RedirectResponse {
        $action->execute(
            $request->user(),
            $request->validated(),
        );

        return to_route('profile.edit')
            ->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(
        DeleteProfileRequest $request,
        DeleteProfileAction $action,
    ): RedirectResponse {
        $action->execute($request->user());

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home');
    }
}
