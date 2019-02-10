<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Headquarter;
use App\Movement;

class HistoryController extends Controller
{
    public function store(Request $request)
    {
        return dd($request->all());
    }

    public function prof_history($id){
        $teacher = Teacher::find($id);
        return view('teacher.history')->with('teacher',$teacher);
    }
}
