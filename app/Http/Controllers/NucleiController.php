<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Headquarter;
use App\Nucleus;

class NucleiController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $sedes = Headquarter::all();
        $nucleos = Nucleus::all();
        $i = 1;
        return view('precargar_datos.nucleos')
        ->with('i',$i)
        ->with('nucleos',$nucleos)
        ->with('sedes',$sedes);
    }

    public function store(Request $request)
    {
        $data = Request()->validate(
            [
                'nucleus'           =>  'required|min:5',
                'headquarter_id'    =>  'required|max:50',
            ],
            [
                'nucleus.required'          =>  'El nucleo debe tener un nombre!',
                'headquarter_id.required'   =>  'La sede debe tener un nombre!',
                'nucleus.min'               =>  'El nombre del nucleo es demasiado corto!',
                'nucleus.max'               =>  'El nombre del nucleo es demasiado largo!',
            ]);
        $nucleo = Nucleus::create($data);
        return back()->with('info','Nucleo creado exitosamente!');
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
        $nucleo = Nucleus::find($id)->delete();
        return back()->with('info','Nucleo eliminado con exito!');
    }
}
