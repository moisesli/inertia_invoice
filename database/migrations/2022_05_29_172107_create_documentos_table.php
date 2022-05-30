<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('documentos', function (Blueprint $table) {
      $table->id();
      $table->string('serie', 11);
      $table->string('tipo_documento', 11);
      $table->date('fecha_emision');
      $table->date('fecha_vencimiento');
      $table->string('moneda', 11);
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
    Schema::dropIfExists('documentos');
  }
};
