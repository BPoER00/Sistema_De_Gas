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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('User');
            $table->string('Email')->unique();
            $table->timestamp('Password');
            $table->unsignedBigInteger('Roles_Id');
            $table->integer('Estado')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('Roles_Id')->references('id')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
};
