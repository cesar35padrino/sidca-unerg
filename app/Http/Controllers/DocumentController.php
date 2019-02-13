<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function create_document($id)
    {
        $teacher = Teacher::find($id);
        return view('teacher/document')
        ->with('teacher', $teacher);
    }

    public function store(Request $request)
    {
        // Guardando archivo
        $type = $request->type;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nameFile = time()."_".$type."_".$file->getClientOriginalName();
            $file->move(public_path()."/".$type."/",$nameFile);
        }

        $document = Document::create([
            'type'          =>  $type,
            'file'          =>  $nameFile,
            'teacher_id'    => $request->teacher_id
        ]);

        return back()->with('info','Subida exitosa!');
    }
}
