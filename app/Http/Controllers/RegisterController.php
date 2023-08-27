<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User; //Importar modelo User

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

        /*
        Modificar el Request en caso de una excepcion que no controle laravel
        $request->request->add([ 'username' => Str::slug($request->username)]);

        Esto lo que hace es reescribir lo que este en el campo username,
        Despues llega a la validacion de Laravel, y asi lo compara con los demas datos
        de la tabla users para ver que sea unico
        */

        //Validacion de Laravel

        //Le pasamos los request y las reglas que tendra
        //Con el "|" podemos ir acumulando reglas
        $this->validate($request,[
            'name' => 'required|max:30', 
            'username' => 'required|unique:users|min:3|max:20', //En la tabla users, verificaremos que sea unico
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6' //Con confirmed, el password_confirmations e actuva
        ]);

        //Pasamos la validacion
        //dd('Creando usuario');

        //EL create nos permite crear nuevos registros, equivalente al INSERT INTO
        //No agregamos ID ya que ese su pone en automatico en A.I, esto ira directo a la BD
        User::create([
            'name' => $request->name, //Tambien se puede usar $request->get('name);
            'username' => Str::slug($request->username), //Convierte el string a una url (minusculas y sin espacios)
            'email' => $request->email,
            'password' => $request->password,
            //'password' => Hash::make($request->password); // Hashear en caso de que no lo haga
        ]);

        //Datos insertados correctamente...

        // Autenticar usuario... (Aqui llenamos el objeto auth())

        /*
        Forma 1
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]); 
        */

        //Forma 2
        //Le decimos que del request tome email y password, e intente autenticar al user
        auth()->attempt($request->only('email','password'));

        //Redireccionando usando un helper
        //Podemos acceder a el atraves del nombre que le dimos en web.php
        return redirect()->route('posts.index');

    }
}
