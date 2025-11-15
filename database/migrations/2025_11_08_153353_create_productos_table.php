<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->index();
            $table->text('descripcion')->nullable();
            $table->enum('categoria', ['entradas', 'platos principales', 'acompañamientos', 'postres', 'bebidas'])->index();
            $table->decimal('precio', 8, 2);
            $table->string('ruta_imagen')->nullable();
            $table->enum('estado', ['disponible', 'agotado', 'inactivo'])->default('disponible')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
