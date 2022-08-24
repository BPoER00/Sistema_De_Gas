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
        Schema::create('permiso', function (Blueprint $table) {
            $table->id();
            $table->string('Descripcion', 100);
            $table->unsignedBigInteger('Roles_Id');
            $table->unsignedBigInteger('Modulo_Id');
            $table->unsignedBigInteger('Accion_Id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('Roles_Id')->references('id')->on('rol');
            $table->foreign('Modulo_Id')->references('id')->on('modulo');
            $table->foreign('Accion_Id')->references('id')->on('accion');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permiso');
    }
};
