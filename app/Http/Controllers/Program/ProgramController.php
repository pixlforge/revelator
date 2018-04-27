<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Http\Requests\Program\StoreProgramRequest;
use App\Http\Requests\Program\UpdateProgramRequest;
use App\Option;
use App\Program;

class ProgramController extends Controller
{
    /**
     * ProgramController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])
            ->except(['index']);
    }

    /**
     * Fetch a list of all programs.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $programs = Program::with('options')->orderBy('title')->get();

        return response($programs, 200);
    }

    /**
     * Store a new program.
     *
     * @param StoreProgramRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(StoreProgramRequest $request)
    {
        $program = new Program;
        $program->title = $request->title;
        $program->code = $request->code;
        $program->slogan = $request->slogan;
        $program->description = $request->description;
        $program->url = $request->url;
        $program->save();

        $options = Option::all();

        foreach ($options as $option) {
            $option->programs()->save($program);
        }

        return response($program, 200);
    }

    /**
     * Get a single program.
     *
     * @param Program $program
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Program $program)
    {
        return response($program, 200);
    }

    /**
     * Update an existing program.
     *
     * @param UpdateProgramRequest $request
     * @param Program $program
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update(UpdateProgramRequest $request, Program $program)
    {
        $program->title = $request->title;
        $program->code = $request->code;
        $program->slogan = $request->slogan;
        $program->description = $request->description;
        $program->url = $request->url;
        $program->save();

        return response($program, 200);
    }

    /**
     * Delete an existing program.
     *
     * @param Program $program
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return response(null, 204);
    }
}
