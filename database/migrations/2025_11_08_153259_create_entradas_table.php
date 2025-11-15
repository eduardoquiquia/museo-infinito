<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('tipo', ['general', 'adulto mayor', 'estudiantes', 'niños'])->index();
            $table->date('fecha_compra');
            $table->date('fecha_visita')->nullable()->index();
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 8, 2);
            $table->decimal('total', 10, 2);
            $table->enum('estado', ['pendiente', 'pagada', 'cancelada'])->default('pendiente')->index();

            $table->nullableMorphs('origen');

            $table->index(['user_id', 'estado']);
            $table->index(['fecha_visita', 'estado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
