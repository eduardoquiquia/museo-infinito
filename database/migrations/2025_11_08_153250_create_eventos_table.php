<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->index();
            $table->text('descripcion');
            $table->date('fecha')->index();
            $table->time('hora');
            $table->enum('ubicacion', []);
            $table->enum('categoria', [])->index();
            $table->decimal('precio', 8, 2);
            $table->integer('capacidad');
            $table->string('ruta_imagen')->nullable();
            $table->enum('estado', ['activo', 'inactivo', 'cancelado'])->default('activo')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
