<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /* ESTE CONTROLADOR DEBE ESTAR PROTEGIDO
       YA QUE PARA TENER UN MURO, DAR LIKES ETC.
       SE NECESITA UNA CUENTA, POR ESO SE CREA ESTE
       CONSTRUCTOR
    */
    public function __construct()
    {
        $this->middleware('auth');    
    }

    //Antes de que se ejecute el index, se ejecuta el constructor (middleware)
    //Esto para comprobar que en verdad el usuario este autenticado
    public function index(User $user) //Importamos el modelo User, se envia desde el web.php
    {
        //auth() es un helper que ve que usuario esta autenticado actualmente
        //La informacion que tenemos es la que vemos en "attribute" al registrar user
        //dd(auth())->user();

        //dd($user->username); //imprime el nombre del usuario  de la sesionactual

        return view('dashboard',[
            'user' => $user, //Le pasamos a dashboard, la variable user para pasarlo a la vista
        ]);
    }
}
