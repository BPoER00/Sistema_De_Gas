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
        Schema::create('encargo', function (Blueprint $table) {
            $table->id();
            $table->string('Descripcion', 65);
            $table->string('Indicaciones', 100);
            $table->unsignedBigInteger('Direccion_Id');
            $table->unsignedBigInteger('Persona_Id');
            $table->unsignedBigInteger('Usuario_Id');
            $table->integer('Estado')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('Direccion_Id')->references('id')->on('direccion');
            $table->foreign('Persona_Id')->references('id')->on('persona_envio');
            $table->foreign('Usuario_Id')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encargo');
    }
};
