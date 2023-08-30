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
}
