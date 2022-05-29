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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ruc',11);
            $table->string('razon_social', 150);
            $table->string('razon_comercial', 150);
            $table->string('direccion', 150);
            $table->string('responsable', 100);
            $table->string('telefono', 50);
            $table->string('celular', 50);
            $table->string('ubigeo', 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
