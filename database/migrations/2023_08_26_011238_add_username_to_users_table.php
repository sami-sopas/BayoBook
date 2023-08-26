<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     //Metodo que se ejecuta cuando se corre la migracion
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique(); //Se agrega a la tabla users, la columna username, se le indica que sera unico

            //Despues de modificar una migracion, se debe correr el comando php artisan migration para hacer cambios
        });
    }

    /**
     * Reverse the migrations.
     */

     //Metodo cuando se ejecuta el rollback
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username'); //Eliminar columna en caso de errores. regresar
        });
    }
};
