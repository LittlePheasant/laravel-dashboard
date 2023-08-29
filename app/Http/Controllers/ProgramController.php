<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MOdels\Program;

class ProgramController extends Controller
{
    function __construct() {
        $this->program = new Program;
    }

    public function program_list(Request $request) {

        $programs = Program::with('user:user_id,campus_name')->paginate(5);
        
        $headers = view('program.program')->render();

        return response()->json(['headers' => $headers, 'program' => $programs]);
    }
}
