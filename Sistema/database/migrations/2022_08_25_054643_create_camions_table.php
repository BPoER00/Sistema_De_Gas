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
        Schema::create('camion', function (Blueprint $table) {
            $table->id();
            $table->string('Descripcion', 100);
            $table->unsignedBigInteger('Usuario_Id');
            $table->unsignedBigInteger('Peso_Id');
            $table->unsignedBigInteger('Categoria_Camiones_Uso_Id');
            $table->unsignedBigInteger('Marca_Id');
            $table->unsignedBigInteger('Tipo_Camion_Id');
            $table->unsignedBigInteger('Rueda_Camion_Id');
            $table->unsignedBigInteger('Tipo_Camion_Mercaderia_Id');
            $table->unsignedBigInteger('Tamanio_Id');
            $table->unsignedBigInteger('Uso_Camion_Id');
            $table->integer('Estado')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('Usuario_Id')->references('id')->on('usuario');
            $table->foreign('Peso_Id')->references('id')->on('peso');
            $table->foreign('Categoria_Camiones_Uso_Id')->references('id')->on('categoria_camion_uso');
            $table->foreign('Marca_Id')->references('id')->on('marca');
            $table->foreign('Tipo_Camion_Id')->references('id')->on('tipo_camion');
            $table->foreign('Rueda_Camion_Id')->references('id')->on('rueda_camion');
            $table->foreign('Tipo_Camion_Mercaderia_Id')->references('id')->on('tipo_camion_mercaderia');
            $table->foreign('Tamanio_Id')->references('id')->on('tamanio');
            $table->foreign('Uso_Camion_Id')->references('id')->on('uso_camion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camion');
    }
};
