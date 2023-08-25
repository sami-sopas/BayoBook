<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() 
    {
        //El controlador carga la vista a mostrar
        return view('auth.register'); #para entrar a una carpeta, aqui se usa . en vez de /
    }

    public function autenticar() 
    {
        return view('auth.register'); #para entrar a una carpeta, aqui se usa . en vez de /
    }
}
