<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        //auth() es un helper que ve que usuario esta autenticado actualmente
        //La informacion que tenemos es la que vemos en "attribute" al registrar user
        //dd(auth())->user();

        return view('dashboard');
    }
}
