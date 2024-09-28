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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("imagen");
            $table->string("nombre");
            $table->string("categoria");
            $table->string("color")->nullable();
            $table->string("tamaño")->nullable();
            $table->string("precio")->nullable();
            $table->string("cantidad")->nullable();
            $table->longText("descripcion")->nullable();
            $table->string("temporada")->nullable();
            $table->string("creador")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};