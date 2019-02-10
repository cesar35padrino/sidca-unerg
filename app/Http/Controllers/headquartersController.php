<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Headquarter;

class HeadquartersController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        $sedes = Headquarter::all();
        $i = 1;
        return view('precargar_datos.sedes')->with('sedes',$sedes)
        ->with('i',$i);
    }

    public function store(Request $request)
    {
        $data = request()->validate(
        [
            'headquarter' => 'min:5|max:100',
        ],
        [
            'name.required'     =>  'El nombre de la sede es requerido!',
            'headquarter.min'   =>  'El nombre es demasiado corto!',
            'headquarter.max'   =>  'El nombre es demasiado largo!',
        ]);
        // dd($data);
        $sede = Headquarter::create($data);
        return back()->with('info','Sede registrada con exito!');
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
        //
    }
}
