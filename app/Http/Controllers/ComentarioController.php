<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //Recordar que user y post se envian a la url como parametro
    public function store(Request $request, User $user, Post $post)
    {
        //dd('Comentando...');

        //Validar
        $this->validate($request,[
            'comentario' => 'required|max:255'
        ]);

        //Almacenar 
        Comentario::create([
            'user_id' => auth()->user()->id, //ID de nosotros, el usuario autenticado que comenta
            'post_id' => $post->id, //ID del post al que estamos comentando
            'comentario' => $request->comentario
        ]);

        //Imprimir mensaje
        //Los with se imprimen con una sesion en la vista
        return back()->with('mensaje','Comentario Realizado Correctamente');
    }
}
