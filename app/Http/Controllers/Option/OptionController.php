<?php

namespace App\Http\Controllers\Option;

use App\Option;
use App\Program;
use App\Http\Controllers\Controller;
use App\Http\Requests\Option\StoreOptionRequest;
use App\Http\Requests\Option\UpdateOptionRequest;

class OptionController extends Controller
{
    /**
     * OptionController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])
            ->except(['index']);
    }

    /**
     * Fetch a list of all options.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $options = Option::with('question', 'programs')->orderBy('question_id')->get();

        return response($options, 200);
    }

    /**
     * Store a new option.
     *
     * @param StoreOptionRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(StoreOptionRequest $request)
    {
        $option = new Option;
        $option->name = $request->name;
        $option->pos = $request->pos;
        $option->question_id = $request->question_id;
        $option->save();

        $sorted = array_values(array_sort($request->programs, function ($value) {
            return $value['id'];
        }));

        $programs = Program::all();

        if ($sorted) {
            foreach ($programs as $index => $program) {
                $program->options()->save($option, [
                    'value' => $sorted[$index]['value']['value']
                ]);
            }
        } else {
            foreach ($programs as $index => $program) {
                $program->options()->save($option);
            }
        }

        return response($option, 200);
    }

    /**
     * Get a single option.
     *
     * @param Option $option
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Option $option)
    {
        $option->load('programs');

        return response($option, 200);
    }

    /**
     * Update an existing option.
     *
     * @param UpdateOptionRequest $request
     * @param Option $option
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update(UpdateOptionRequest $request, Option $option)
    {
        $option->name = $request->name;
        $option->pos = $request->pos;
        $option->question_id = $request->question_id;
        $option->save();

        $sorted = array_values(array_sort($request->programs, function ($value) {
            return $value['id'];
        }));

        $programs = Program::all();

        foreach ($programs as $index => $program) {
            $program->options()->updateExistingPivot($option, [
                'value' => $sorted[$index]['value']['value']
            ]);
        }

        return response($option, 200);
    }

    /**
     * Delete an existing option.
     *
     * @param Option $option
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function destroy(Option $option)
    {
        $option->delete();

        return response(null, 204);
    }
}
