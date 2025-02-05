<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->id();
            $table->string('regional');
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('correo_personal');
            $table->string('numero_contrato');
            $table->date('fecha_inicio_contrato');
            $table->date('fecha_terminacion_contrato');
            $table->string('usuario');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitantes');
    }
};
