<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Resolver error del fillable 
    //Informacion que tiene que procesar antes de enviar a la BD
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id', 
    ];

    //Metodo para decir que un Post pertenece a un usuario
    //Relacion de N a 1
    public function user()
    {
        //Con el select, decimos que campos nos queremos traer de la relacion
        //Para que no muestre todos al usar $posts->user
        return $this->belongsTo(User::class)->select(['name','username']);
    }
}
