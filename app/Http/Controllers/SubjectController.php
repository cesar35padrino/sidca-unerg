<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $i = 1;
        $asignaturas = Subject::all();
        $programas = Program::all();
        return view('precargar_datos.unidad_curricular')
        ->with('i',$i)
        ->with('asignaturas',$asignaturas)
        ->with('programas',$programas);
    }

    public function store(Request $request)
    {
        $data = Request()->validate(
            [
                'subject'           =>  'required', 
                'level'             =>  'required', 
                'theoretical_hour'  =>  'required', 
                'practical_hour'    =>  'required', 
                'program_id'        =>  'required',
            ],
            [
                'subject.required'              =>  'El nombre de la asignatura es requerido!',
                'level.required'                =>  'El nivel de la asignatura es requerido!',
                'theoretical_hour.required'     =>  'Las horas teoricas de la asignatura son requeridas!',
                'practical_hour.required'       =>  'Las horas practicas de la asignatura son requeridas!',
                'program_id.required'           =>  'El programa donde se aplica la asignatura es requerido!',
            ]);

        $asignatura = Subject::create($data);
        return back()->with('info','La asignatura fue registrada con exito!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $asignatura = Subject::find($id)->delete();
        return back()->with('info','Asignatura eliminada con exito!');
    }
}
