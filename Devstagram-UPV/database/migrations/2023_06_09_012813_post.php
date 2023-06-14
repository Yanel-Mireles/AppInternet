<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post', function (Blueprint $table) {
            //Agregar campo a la tabla de usuarios UNICO
            $table -> id();
            $table ->string('titulo');
            $table->text('descripcion');
            $table->string('imagen');
            
            //agregamos el usuario asociado al post del publicacion: una relacion user-post
            $table->foreignId('user_id') -> constrained()->onDelete('cascade');
            //onDelete (cascade) sigifica que si un usuario se elimna, se eliminan sus post de publicaciones 
            $table->timestamps();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }


};
