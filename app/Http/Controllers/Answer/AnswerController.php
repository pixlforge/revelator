<?php

namespace App\Http\Controllers\Answer;

use App\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    /**
     * AnswerController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request)
    {
        $answer = Answer::where([
            ['user_id', $request->user_id],
            ['question_id', $request->question_id]
        ])->first();

        if ($answer) {
            $answer->option_id = $request->option_id;
            $answer->save();
        } else {
            $answer = new Answer;
            $answer->user_id = $request->user_id;
            $answer->question_id = $request->question_id;
            $answer->option_id = $request->option_id;
            $answer->save();
        }

        return response(null, 200);
    }
}
