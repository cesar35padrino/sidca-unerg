<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UsersController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('user.index')
            ->with('usuarios',$usuarios);
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create')
            ->with('roles',$roles);
    }

    public function store(Request $request)
    {
        $data = Request()->validate(
            [
                'user'          =>  'required|unique:users',
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'email'         =>  'required|unique:users',
                'identity'      =>  'required|unique:users',
                'role_id'       =>  'required',
                'password'      =>  'required',
            ],
            [
                'user.required'          =>  'El nombre de usuario es requerido!',
                'first_name.required'    =>  'Los nombres son requeridos!',
                'last_name.required'     =>  'Los apellidos son requeridos!',
                'email.required'         =>  'El correo electronico es requerido!',
                'identity.required'      =>  'La cedula es requerida!',
                'role_id.required'       =>  'El rol es requerido!',
                'password.required'      =>  'La contraseña es requerida!',
                'user.unique'            =>  'El nombre de usuario debe ser unico!',
                'identity.unique'        =>  'La cedula debe ser unica!',
                'email.unique'           =>  'El correo electronico debe ser unico!',
            ]
        );

        $usuario = User::create([
            'user'          =>  $data['user'],
            'first_name'    =>  $data['first_name'],
            'last_name'     =>  $data['last_name'],
            'email'         =>  $data['email'],
            'identity'      =>  $data['identity'],
            'role_id'       =>  $data['role_id'],
            'password'      =>  bcrypt($data['password']),
        ]);

        return redirect(route('usuarios.index'))->with('info','Usuario creado con exito!');
    }

    public function show($id)
    {
        $usuario = User::find($id);
        return view('user.show')->with('usuario',$usuario);
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        return view('user.edit')->with('usuario',$usuario);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id)->update($request->all());
        return back()->with('info','Usuario actualizado con exito!');
    }

    public function destroy($id)
    {
        $usuario = User::find($id)->delete();
        return back()->with('info','Usuario eliminado con exito!');
    }
}
