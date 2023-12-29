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
        Schema::create('compras2s', function (Blueprint $table) {
            $table->id();
            $table->string("nombreClienteSession");
            $table->string("idFKProducto");
            $table->string("colorSeleccionado");
            $table->string("tamañoSeleccionado");
            $table->string("cantidad");
            $table->string("cedula");
            $table->string("nombre");
            $table->string("telefono");
            $table->string("direccion");
            $table->string("imagen");
            $table->string("sumaTotal");
            $table->string("nFactura");
            $table->string("opcionEnvio");
            $table->string("estatus");
            $table->string("metodoPago");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras2s');
    }
};
