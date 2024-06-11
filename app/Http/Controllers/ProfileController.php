<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        Log::info('Current user:', ['user' => $request->user()]);

        if (!$request->user()) {
            Log::info('No authenticated user found, attempting to resolve user by email.');
            $request->setUserResolver(function () use ($request) {
                $user = \App\Models\User::where('email', $request->input('email'))->first();
                Log::info('Resolved user:', ['user' => $user]);
                return $user;
            });
        }

        $user = $request->user();
        Log::info('User after resolver:', ['user' => $user]);

        $user->fill($request->only(['username', 'name', 'email', 'picture']));

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function process(Request $request): RedirectResponse
    {
        Log::info($request);
        $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'password' => ['sometimes', Rules\Password::defaults()],
            'picture' => ['sometimes', 'file', 'mimes:jps,png,gif', 'max:3072'],
        ]);

        $path = null;
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->storePublicly('images', 'public');
        }
        Log::info($path);
        $profileRequest = $request->only('username', 'name', 'email');
        if ($path !== null) {
            $profileRequest['picture'] = $path;
        }
        $profileUpdateRequest = new ProfileUpdateRequest();
        $profileUpdateRequest->merge($profileRequest);
        Log::info($profileUpdateRequest);
        if ($request->password) {
            $passwordController = new PasswordController();
            $passwordController->update($request->password);
        }
        $this->update($profileUpdateRequest);

        return Redirect::to('/profile');
    }
}
