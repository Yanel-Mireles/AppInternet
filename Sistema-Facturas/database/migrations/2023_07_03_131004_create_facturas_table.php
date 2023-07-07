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
        Schema::create('facturas', function (Blueprint 
            $table) {
            $table->id();
            $table->foreignId('emisor_id')->constrained()->onDelete('cascade');
            $table->foreignId('receptor_id')->constrained()->onDelete('cascade');
            $table->string('folio');
            $table->string('archivopdf');
            $table->string('archivoxml');
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
