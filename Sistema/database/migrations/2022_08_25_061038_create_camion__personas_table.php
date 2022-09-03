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
        Schema::create('camion_persona', function (Blueprint $table) {
            $table->id();
            $table->string('Descripcion', 100);
            $table->unsignedBigInteger('Camiones_Id');
            $table->unsignedBigInteger('Chofer_Id');
            $table->unsignedBigInteger('Usuario_Id');
            $table->integer('Estado')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('Camiones_Id')->references('id')->on('camion');
            $table->foreign('Chofer_Id')->references('id')->on('chofer');
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
        Schema::dropIfExists('camion_persona');
    }
};
