<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        //dd('Cerrando sesion');

        //Helper auth para cerrar la sesion
        auth()->logout();

        //Redireccionando
        return redirect()->route('login');
    }
}
