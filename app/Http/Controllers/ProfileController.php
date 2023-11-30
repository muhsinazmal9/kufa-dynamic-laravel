<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Traits\ImageSaveTrait;

class ProfileController extends Controller
{
    use ImageSaveTrait;
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): RedirectResponse
    {
        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);

        // return view('backend.profile.index');
        return redirect()->route('dashboard');
    }

    /**
     * Update the user's profile information.
     */

    // ProfileUpdateRequest
    public function update(Request $request, User $user) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.auth()->user()->id]
        ]);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        // dd($user);

        $data = [];

        if($request->hasFile('big_avatar')) {
            $request->validate([
                'big_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($user->big_avatar) {
                $data = [
                    'big_avatar' => $this->updateImage('avatar', $request->big_avatar, $user->big_avatar, 600, 850)
                ];
            } else {
                $data = [
                    'big_avatar' => $this->saveImage('avatar', $request->big_avatar, 600, 850)
                ];
            }
        }

        $user->update($request->except('_token', '_method', 'big_avatar') + $data);

        return redirect()->route('dashboard')->withToastSuccess('Saved successfully!');
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
}
