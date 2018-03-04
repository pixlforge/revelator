<?php

namespace App\Http\Controllers\Program;

use App\Program;
use App\Http\Controllers\Controller;
use App\Http\Requests\Program\StoreProgramRequest;

class ProgramController extends Controller
{
    /**
     * ProgramController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Fetch a list of all programs.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $programs = Program::orderBy('title')->get();

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
        $program->description = $request->description;
        $program->save();

        return response($program, 200);
    }
}
