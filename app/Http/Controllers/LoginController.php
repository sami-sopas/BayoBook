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

        //dd($request->remember); //Imprime ON, cuando se active la opcion de recordar,
                                  //Crea una cookie, y guarda en la BD un remember token

        //Validando datos
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

    
        //Comprobar si las credenciales son correctas

        //Con esto comprobamos en un controlador, y renderizamos en una vista
        //El parametro remember es para saber si el usuario quiere que se recuerde su cuenta
        if(!auth()->attempt($request->only('email','password'), $request->remember)){

            //Creacion de mensaje para mostrar en la vista en caso de error
            //Con Back regresas a la pagina de donde enviaste la informacion
            return back()->with('mensaje','Credenciales Incorrectas');
        }

        //Usuario autenticado, lo mandamos a la secion de posts
        //Le pasamos como parametro el objeto auth, para acceder a username, ya que esa ruta
        //requiere de ese parametro
        return redirect()->route('posts.index',auth()->user()->username);
    }
}
