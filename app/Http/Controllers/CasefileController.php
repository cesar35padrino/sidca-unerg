<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;

class CasefileController extends Controller
{
    public function prof_casefile($id)
    {
        $profesor = Teacher::find($id);
        return view('teacher.casefile')->with('profesor',$profesor);
    }
}
