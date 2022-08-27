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
        Schema::create('chofer', function (Blueprint $table) {
            $table->id();
            $table->string('Documento_Identificacion', 85);
            $table->string('Nombre', 55);
            $table->string('Apellido', 55);
            $table->date('Fecha_Nacimiento');
            $table->integer('Licencia');
            $table->string('Tipo_Licencia', 100)->nullable();
            $table->date('Fecha_Vencimiento')->nullable();
            $table->string('Telefono', 30);
            $table->string('Email', 150);
            $table->unsignedBigInteger('Estado_Civil_Id');
            $table->unsignedBigInteger('Etnia_Id');
            $table->unsignedBigInteger('Usuario_Id');
            $table->integer('Estado')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('Usuario_Id')->references('id')->on('usuario');
            $table->foreign('Etnia_Id')->references('id')->on('etnia');
            $table->foreign('Estado_Civil_Id')->references('id')->on('estado_civil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chofer');
    }
};
