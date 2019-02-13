<?php

namespace App\Http\Controllers;

use App\Perid;
use Illuminate\Http\Request;

class PeridController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $periodos = Perid::all();
        $i = 1;
        return view('precargar_datos.periodos')
        ->with('i',$i)
        ->with('periodos',$periodos);
    }

    public function store(Request $request)
    {
        $data = Request()->validate(
            [
                'perid' =>  'required|unique:perids|min:4|max:6',
            ]
            ,
            [
                'perid.required'    =>  'El periodo no puede estar vacio!',
                'perid.unique'      =>  'El periodo no puede ser repetido!',
                'perid.min'         =>  'No puede ser una expresion menor a 4 cifras!',
                'perid.max'         =>  'No puede ser una expresion mayor a 4 cifras!',
            ]
        );
         // Para crear un periodo este no puede ser menor que el periodo creado anteriormente!
        // $periodos = Perid::all();

        $periodo = Perid::create($data);
        return back()->with('info','El periodo ha sido creado con exito!');
    }

    public function show(Perid $perid)
    {
        //
    }

    public function edit(Perid $perid)
    {
        //
    }

    public function update(Request $request, Perid $perid)
    {
        //
    }

    public function destroy($id)
    {
        $periodo = Perid::find($id)->delete();
        return back()->with('info','El periodo fue eliminado con exito!');
    }
}
