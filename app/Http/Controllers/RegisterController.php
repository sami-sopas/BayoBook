<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //Convenciones
    public function index() 
    {
        //El controlador carga la vista a mostrar
        return view('auth.register'); #para entrar a una carpeta, aqui se usa . en vez de /
    }

    public function store(Request $request) 
    {
        // dd($request); // Imprime lo que le envias pero detiene todo laravel, util para debuggear

        //dd($request->get('email')); // Acceder a algun campo que envie, el campo sera el name en el input

        //Validacion de Laravel

        //Le pasamos los request y las reglas que tendra
        //Con el "|" podemos ir acumulando reglas
        $this->validate($request,[
            'name' => 'required|max:30', //En la tabla users, verificaremos que sea unico
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required'
        ]);

    }
}
