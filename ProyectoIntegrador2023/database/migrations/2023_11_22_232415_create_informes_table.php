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
        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practicante_id');
            $table->string('documento');
            $table->string('estado')->default('En proceso'); // Valor por defecto en 'proceso'
            $table->string('descripcion')->default('Comentario');;

            // Restricción de clave externa para practicante_id
            $table->foreign('practicante_id')->references('id')->on('practicantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informes');
    }
};
