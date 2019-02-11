<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\UpdateRequest;
use App\Teacher;
use App\Title;
use App\Email;
use App\State;
use App\Country;
use App\Headquarter;
use App\Classification;
use App\Phone;
use App\Http\Controllers\Scripts\SearchCurl;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $teachers = Teacher::orderBy('id','DESC')->search($request->search)->paginate(5);
        $sedes = Headquarter::all();
        $paises = Country::all();
        $clasificaciones = Classification::all();
        $estados = State::all();

        // contadores
        $i = 1;
        return view('teacher/index')
            ->with('sedes',$sedes)
            ->with('clasificaciones',$clasificaciones)
            ->with('paises',$paises)
            ->with('estados',$estados)
            ->with('i',$i)
            ->with('teachers', $teachers);
    }

    public function create()
    {
        $sedes = Headquarter::all();
        $paises = Country::all();
        $clasificaciones = Classification::all();
        $estados = State::all();

        return view('teacher.create')
            ->with('sedes',$sedes)
            ->with('clasificaciones',$clasificaciones)
            ->with('paises',$paises)
            ->with('estados',$estados);
    }

    public function store(Request $request)
    {
        // True/1 para Reemplazar informacion por la que esta en el CNE
        if (0) {
            $ci = $request->identity;
            $datosValidados = SearchCurl::get('V', $ci);
            $cne = json_decode($datosValidados, TRUE);

            $profesor = Teacher::create([
            'first_name'        =>  ($cne['nombres'])?$cne['nombres']:$request->first_name,
            'last_name'         =>  ($cne['apellidos'])?$cne['apellidos']:$request->last_name,
            'identity'          =>  $request->identity,
            'birthdate'         =>  $request->birthdate,
            'address'           =>  $request->address,
            'countrie_id'       =>  $request->countrie_id,
            'classification_id' =>  $request->classification_id,
            'headquarter_id'    =>  $request->headquarters_id,
            'status'            =>  $request->status,
            'observation'       =>  ($request->observation)?$request->observation:'NULL',
            'state_id'          =>  $request->state_id,
            'municipality_id'   =>  $request->municipality_id,
            'parish_id'         =>  $request->parish_id,
            ]);

            for ($i=1; $i < 3; $i++) {
                if (!empty($request->input('phone'.$i))) {
                    $telefono= Phone::create([
                        'type'  =>  ($i == 1)?'MOVIL':'CASA',
                        'number'    =>  ($i == 1)?$request->phone1:$request->phone2,
                        'teacher_id'    => $profesor->id
                    ]);
                }
            }

            for ($e=0; $e < 3; $e++) {
                if (!empty($request->input('email'.$e))) {
                    $correo= Email::create([
                        'email'    =>  ($e == 1)?$request->email1:$request->email2,
                        'teacher_id'    => $profesor->id
                    ]);
                }
            }

            return redirect(Route('profesores.edit',$profesor->id))->with('info','Se ha registrado de manera exitosa!');

        }else{
            $profesor = Teacher::create([
            'first_name'        =>  $request->first_name,
            'last_name'         =>  $request->last_name,
            'identity'          =>  $request->identity,
            'birthdate'         =>  $request->birthdate,
            'address'           =>  $request->address,
            'countrie_id'       =>  $request->countrie_id,
            'classification_id' =>  $request->classification_id,
            'headquarter_id'    =>  $request->headquarters_id,
            'status'            =>  $request->status,
            'observation'       =>  ($request->observation)?$request->observation:'NULL',
            'state_id'          =>  $request->state_id,
            'municipality_id'   =>  $request->municipality_id,
            'parish_id'         =>  $request->parish_id,
            ]);

            for ($i=1; $i < 3; $i++) {
                if (!empty($request->input('phone'.$i))) {
                    $telefono= Phone::create([
                        'type'  =>  ($i == 1)?'MOVIL':'CASA',
                        'number'    =>  ($i == 1)?$request->phone1:$request->phone2,
                        'teacher_id'    => $profesor->id
                    ]);
                }
            }

            for ($e=0; $e < 3; $e++) {
                if (!empty($request->input('email'.$e))) {
                    $correo= Email::create([
                        'email'    =>  ($e == 1)?$request->email1:$request->email2,
                        'teacher_id'    => $profesor->id
                    ]);
                }
            }

            return redirect(Route('profesores.edit',$profesor->id))->with('info','Se ha registrado de manera exitosa!');
        }
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        return view('teacher.show')->with('teacher',$teacher);
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $sedes = Headquarter::all();
        $paises = Country::all();
        $clasificaciones = Classification::all();
        $estados = State::all();
        $count_phones = $teacher->phones->count();
        $count_emails = $teacher->emails->count();
        // contadores
        $i = 1;
        $j = 1;

        return view('teacher.edit')
            ->with('count_phones',$count_phones)
            ->with('count_emails',$count_emails)
            ->with('sedes',$sedes)
            ->with('clasificaciones',$clasificaciones)
            ->with('paises',$paises)
            ->with('estados',$estados)
            ->with('i',$i)
            ->with('teacher', $teacher)
            ->with('j', $j);
    }

    public function update(Request $request,$id)
    {
        $teacher = Teacher::find($id);
        $telefonos = Phone::where('teacher_id',$id)->get();
        $correos = Email::where('teacher_id',$id)->get();

        $teacher->update([
            'first_name'    =>  ($request->first_name)?$request->first_name:$teacher->first_name,
            'last_name'     =>  ($request->last_name)?$request->last_name:$teacher->last_name,
            'identity'      =>  ($request->identity)?$request->identity:$teacher->identity,
            'birthdate'     =>  ($request->birthdate)?$request->birthdate:$teacher->birthdate,
            'address'       =>  ($request->address)?$request->address:$teacher->address,
            'countrie_id'   =>  ($request->countrie_id)?$request->countrie_id:$teacher->countrie_id,
            'classification_id'    =>  ($request->classification_id)?$request->classification_id:$teacher->classification_id,
            'headquarters_id'      =>  ($request->headquarters_id)?$request->headquarters_id:$teacher->headquarters_id,
            'status'        =>  ($request->status)?$request->status:$teacher->status,
            'observation'   =>  ($request->observation)?$request->observation:$teacher->observation,
            'state_id'      =>  ($request->state_id)?$request->state_id:$teacher->state_id,
        ]);
        
        // UPDATE PHONE
        foreach ($telefonos as $indice => $telefono) {
            $telefono->update([
                'number' => $request->phones[$indice]
            ]);
        }

        // UPDATE EMAIL
        foreach ($correos as $indice => $correo) {
            $correo->update([
                'email' => $request->emails[$indice]
            ]);
        }

        return back()->with('info','Se ha modificado de manera exitosa!');
    }

    public function design_prof($ci){
        
        $p = file_get_contents('http://localhost:8001/persona/ci/'.$ci, true);
        
        if ($p) {
            return $p;
        }else{
            return "No existe";
        }
    }

    // public function search(){
    //     return
    // } 

    public function destroy($id)
    {
        //
    }
}
