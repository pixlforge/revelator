<?php

namespace App\Http\Controllers\Question;

use App\Question;
use App\Http\Controllers\Controller;
use App\Http\Requests\Question\StoreQuestionRequest;
use App\Http\Requests\Question\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * QuestionController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])
            ->except('index');
    }

    /**
     * Fetch a list of all questions.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $questions = Question::with('options.programs')->orderBy('pos')->get();

        return response($questions, 200);
    }

    /**
     * Store a new question.
     *
     * @param StoreQuestionRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = new Question;
        $question->name = $request->name;
        $question->type = $request->type;
        $question->pos = $request->pos;
        $question->save();

        return response($question, 200);
    }

    /**
     * Get a single question.
     *
     * @param Question $question
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Question $question)
    {
        return response($question, 200);
    }

    /**
     * Update a single question.
     *
     * @param UpdateQuestionRequest $request
     * @param Question $question
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->name = $request->name;
        $question->type = $request->type;
        $question->pos = $request->pos;
        $question->save();

        return response($question, 200);
    }

    /**
     * Delete an existing question.
     *
     * @param Question $question
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return response(null, 204);
    }
}
