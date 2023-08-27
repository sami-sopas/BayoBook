<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //auth() es un helper que ve que usuario esta autenticado actualmente
        //La informacion que tenemos es la que vemos en "attribute" al registrar user
        dd(auth())->user();
    }
}
