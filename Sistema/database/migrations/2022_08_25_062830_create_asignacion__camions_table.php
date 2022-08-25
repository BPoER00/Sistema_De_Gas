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
        Schema::create('asignacion_camion', function (Blueprint $table) {
            $table->id();
            $table->string('Descripcion', 100)->nullable();
            $table->unsignedBigInteger('Encargo_Id');
            $table->unsignedBigInteger('Camion_Persona_Id');
            $table->unsignedBigInteger('Usuario_Id');
            $table->integer('Estado')->default(1);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('Encargo_Id')->references('id')->on('encargo');
            $table->foreign('Camion_Persona_Id')->references('id')->on('camion_persona');
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
        Schema::dropIfExists('asignacion_camion');
    }
};
