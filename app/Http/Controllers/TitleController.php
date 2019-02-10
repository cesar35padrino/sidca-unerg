<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Title;

class TitleController extends Controller
{
    public function create_title($id)
    {
        $teacher = Teacher::find($id);
        $titles = Title::all();
        return view('teacher/title')
        ->with('teacher', $teacher)
        ->with('titles', $titles);
    }

    public function store(Request $request)
    {
        // Guardando archivo
        $title = Title::create([
        	'name'	=>	$request->name,
        	'level'	=>	$request->level
        ]);

        return back()->with('info','Titulo añadido de manera exitosa!');
    }
}
