<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Nombre');
            $table->enum('Tipo', ['Acero', 'Agua', 'Dragón', 'Eléctrico', 'Fantasma', 'Hada', 'Normal', 'Planta', 'Psíquico', 'Siniestro', 'Tierra', 'Volador']);
            $table->enum('Tamaño', ['Grande', 'Mediano', 'Pequeño']);
            $table->float('Peso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
};
