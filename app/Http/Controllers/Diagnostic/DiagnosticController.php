<?php

namespace App\Http\Controllers\Diagnostic;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DiagnosticController extends Controller
{
    /**
     * Log out the currently logged-in user.
     */
    public function logout()
    {
        /**
         * Logout the user if he's currently logged in.
         */
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
}
