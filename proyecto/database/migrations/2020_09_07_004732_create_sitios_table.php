<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_lugar');
            $table->string('tipo_lugar');
            $table->string('ubicacion');
            $table->string('direccion');
            $table->string('descripcion');
            $table->string('img');
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sitios');
    }
}
