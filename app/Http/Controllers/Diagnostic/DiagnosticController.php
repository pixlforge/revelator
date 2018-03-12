<?php

namespace App\Http\Controllers\Diagnostic;

use App\User;
use App\Answer;
use App\Question;
use Illuminate\Http\Request;
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
            ->states('diagnostic')
            ->create();
        Auth::login($user);

        return response($user, 200);
    }

    /**
     * Fetch all questions.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function fetchQuestions()
    {
        $questions = Question::with('options')->orderBy('pos')->get();

        return response($questions, 200);
    }

    /**
     * Store an answer.
     *
     * @param Request $request
     * @return array
     */
    public function addAnswer(Request $request)
    {
        $answer = Answer::where([
            ['user_id', $request->user],
            ['question_id', $request->question]
        ])->first();

        if ($answer) {
            $answer->option_id = $request->option;
            $answer->save();
        } else {
            $answer = new Answer;
            $answer->user_id = $request->user;
            $answer->question_id = $request->question;
            $answer->option_id = $request->option;
            $answer->save();
        }

        return response(null, 200);
    }
}
