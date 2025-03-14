<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//Modelo que viene por defecto en Laravel

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     //Datos que esperamos que el usuario nos de
    protected $fillable = [
        'name',
        'email',
        'password',
        'username', //Registramos username, el campo que agregamos a traves de la migracion
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //Metodo del modelo para realizar la relacion 1 a muchos
    //1 usuario puede tener multiples Posts
    public function posts()
    {
        //como segundo argumento, puede tomar la foreign key a la que hacemos referencia
        return $this->hasMany(Post::class);
    }
}
