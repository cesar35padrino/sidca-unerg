<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Area;

class ProgramsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $i = 1;
        $programas = Program::all();
        $areas = Area::all();
        return view('precargar_datos.programas')
        ->with('i',$i)
        ->with('programas',$programas)
        ->with('areas',$areas);
    }

    public function store(Request $request)
    {
        $data = Request()->validate(
            [
                'program'       =>  'required',
                'director'      =>  'required',
                'resolution'    =>  'required',
                'area_id'       =>  'required',
            ],
            [
                'program.required'      =>  'El nombre del programa es requerido!',
                'director.required'     =>  'El nombre del director es requerido!',
                'resolution.required'   =>  'La resolucion es requerida!', 
                'area_id.required'      =>  'El area donde pertenece el programa es requerida!',
            ]
        );
        $programa = Program::create($data);

        return back()->with('info','El programa ha sido registrado con exito!');
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
        $programa = Program::find($id)->delete();
        return back()->with('info','Programa eliminado con exito!');
    }
}
