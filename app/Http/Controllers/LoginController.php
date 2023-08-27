<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //dd('Autenticando...');

        //Validando datos
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Comprobar si las credenciales son correctas

        //Con esto comprobamos en un controlador, y renderizamos en una vista
        if(!auth()->attempt($request->only('email','password'))){

            //Creacion de mensaje para mostrar en la vista en caso de error
            //Con Back regresas a la pagina de donde enviaste la informacion
            return back()->with('mensaje','Credenciales Incorrectas');
        }

        //Usuario autenticado, lo mandamos a la secion de posts
        return redirect()->route('posts.index');
    }
}
