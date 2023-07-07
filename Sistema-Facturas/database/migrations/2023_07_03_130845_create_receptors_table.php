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
        Schema::create('receptors', function (Blueprint 
        $table) {
        $table->id();
        $table->string('nombre');
        $table->string('direccion');
        $table->string('rfc')->unique();
        $table->string('contacto');
        $table->string('razon_Social');
        $table->string('email')->unique();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receptors');
    }
};

