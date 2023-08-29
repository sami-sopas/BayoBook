<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //Funcion para almacenar las imagenes
    public function store(Request $request) //Request es lo que recibe este controlador
    {
        $imagen = $request->file('file');

        //Generar ID unico para cada imagen
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        //Imagen que se guardara en el servidor, creamos una imagen de intervention image
        $imagenServidor = Image::make($imagen);

        //Reedimensionar la intervention image
        $imagenServidor->fit(1000,1000,null,'center');

        //Definiendo el path donde se guardaran las imagenes
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;

        //Movemos la imagen en memoria, al path que definimos
        $imagenServidor->save($imagenPath);

        //Imprime el tipo de extension de la imagen {"imagen": "jpg"}
        //Esto imprime en la consola de JS el nombre de la imagen para comprobar que funcione todo
        //El nombre de la imagen es la que se guardara en la BD
        return response()->json(['imagen' => $nombreImagen]);
    }
}
