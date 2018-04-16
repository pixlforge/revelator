<?php

namespace App\Http\Controllers\Diagnostic;

use App\User;
use Exception;
use App\Mail\SendMeMyResultsEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
     * @param $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function login($user = null)
    {
        if ($user) {
            $user = User::where('name', $user)->first();
            Auth::login($user);
        } else {
            $user = factory(User::class)
                ->states('guest')
                ->create();
            Auth::login($user);
        }

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

    /**
     * Send the authenticated user a link to his results.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function send()
    {
        $user = User::where('id', auth()->id())->first();

        try {
            Mail::to($user->guest_email)
                ->queue(new SendMeMyResultsEmail($user));

            return response(null, 204);
        } catch (Exception $e) {
            return response($e, 500);
        }
    }
}
