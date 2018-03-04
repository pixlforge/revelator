<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class SpaController extends Controller
{
    /**
     * Main index view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        if (!auth()->user()) {
//            $user = factory(User::class)->states('random')->create();
//            Auth::login($user, true);
//        }

        return view('spa');
    }
}
