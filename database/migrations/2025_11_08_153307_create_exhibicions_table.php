<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exhibicions', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->index();
            $table->text('descripcion');
            $table->enum('categoria', ['arqueologia', 'historia', 'fossiles', 'arte', 'antiguedades'])->index();
            $table->string('ruta_imagen_360')->nullable();
            $table->string('periodo')->nullable()->index();
            $table->date('fecha_descubrimiento')->nullable()->index();
            $table->string('lugar_hallazgo')->nullable();
            $table->text('descripcion_detallada')->nullable();
            $table->boolean('destacada')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exhibicions');
    }
};
