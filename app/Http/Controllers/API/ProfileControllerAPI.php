<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Controllers\Auth\PasswordController;

class ProfileControllerAPI extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return response()->json(['user' => $user], 200);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        if (!$request->user()) {
            Log::info('No authenticated user found, attempting to resolve user by email.');
            $request->setUserResolver(function () use ($request) {
                $user = User::where('email', $request->input('email'))->first();
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

        return response()->json(['message' => 'Profile updated successfully.'], 200);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        Auth::logout();

        $user->delete();

        return response()->json(['message' => 'Account deleted successfully.'], 200);
    }

    public function process(Request $request)
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

        return response()->json(['message' => 'Profile edited successfully.'], 200);
    }
}
