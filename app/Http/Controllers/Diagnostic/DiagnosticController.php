<?php

namespace App\Http\Controllers\Diagnostic;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\UpdateGuestRequest;

class DiagnosticController extends Controller
{
    /**
     * Log out the currently logged-in user.
     */
    public function logout()
    {
        if (auth()->user()) {
            Auth::logout();
        }

        return response(null, 204);
    }

    /**
     * Create a new user and log him in.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function login()
    {
        $user = factory(User::class)
            ->states('guest')
            ->create();
        Auth::login($user);

        return response($user, 200);
    }

    /**
     * Update the guest's personal infos.
     *
     * @param UpdateGuestRequest $request
     * @param User $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update(UpdateGuestRequest $request, User $user)
    {
        $user->user_consents = $request->user_consents;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->guest_email = $request->guest_email;
        $user->save();

        return response($user, 200);
    }
}
