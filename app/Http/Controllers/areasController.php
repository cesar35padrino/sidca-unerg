<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Nucleus;

class AreasController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $i = 1;
        $areas = Area::all();
        $nucleos = Nucleus::all();
        return view('precargar_datos.area_academica')
        ->with('areas',$areas)
        ->with('nucleos',$nucleos)
        ->with('i',$i);
    }

    public function store(Request $request)
    {
        $data = Request()->validate(
        [
            'area'          =>  'required|min:5|max:20',
            'nuclei_id'     =>  'required',
            'code'          =>  'required',
            'dean'          =>  'required|min:5|max:30',
            'resolution'    =>  'required',
        ],
        [
            'area.required' =>  'El nombre del area es requerida!',
            'area.min'      =>  'El nombre del area es muy corto!',
            'area.max'      =>  'El nombre del area es muy largo!',
            'code.required' =>  'El codigo del area es requerido!',
            'dean.required' =>  'El nombre del decano es requerido!',
            'dean.min'      =>  'El nombre del decano es muy corto!',
            'dean.max'      =>  'El nombre del decano es muy largo!',
        ]);

        $area = Area::create($data);

        return back()->with('info','Area agregada con exito!');
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
        $area = Area::find($id)->delete();
        return back()->with('info','Area eliminada con exito!');
    }
}
