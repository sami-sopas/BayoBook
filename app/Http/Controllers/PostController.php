<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

    public function create()
    {
        //dd('Creando post...');
        return view('posts.create');
    }

    //Validar y guardar en la BD
    public function store(Request $request)
    {
        //dd('Publicacion enviada');

        //Validando los campos de la publicacion
        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        //Modelo de Post que creamos,
        //le pasamos un arreglo con la informacion que debe ir en la BD (migracion post table)
        Post::create([ //Forma 1 de crear registros en laravel
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id, //Sacar id del usuario actual (auth)
        ]);

        //Forma 2 de crear registros
        /*
        $post = new Post;
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id;
        $post->save();
        */

        //Redirigir al usuario a su muro, recordar que como parametro requiere su nombre de usuario
        return redirect()->route('posts.index',auth()->user()->username);
    }
}
