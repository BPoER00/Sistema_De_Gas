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
        Schema::create('direccion_chofer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Chofer_Id');
            $table->unsignedBigInteger('Direccion_Id');
            $table->unsignedBigInteger('Usuario_Id');
            $table->integer('Estado')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('Chofer_Id')->references('id')->on('chofer');
            $table->foreign('Direccion_Id')->references('id')->on('direccion');
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
        Schema::dropIfExists('direccion_chofer');
    }
};
