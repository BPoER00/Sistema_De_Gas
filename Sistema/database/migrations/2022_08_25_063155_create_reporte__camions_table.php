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
        Schema::create('reporte_camion', function (Blueprint $table) {
            $table->id();
            $table->string('Gasto_Gas', 65);
            $table->string('Galones', 45);
            $table->string('Factura_No', 45);
            $table->string('Descripcion', 105);
            $table->unsignedBigInteger('Asignacion_Camion_Id');
            $table->unsignedBigInteger('Usuario_Id');
            $table->integer('Estado')->default(1);
            $table->timestamps();

            $table->foreign('Asignacion_Camion_Id')->references('id')->on('asignacion_camion');
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
        Schema::dropIfExists('reporte_camion');
    }
};
