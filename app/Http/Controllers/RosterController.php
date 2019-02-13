<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roster;
use App\Area;
use App\Program;
use App\Headquarter;

class RosterController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $areas = Area::all();
        $programas = Program::all();
        $sedes = Headquarter::all();
        return view('nominas.create')
        ->with('areas',$areas)
        ->with('programas',$programas)
        ->with('sedes',$sedes);
    }

    public function store(Request $request)
    {
        //
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
