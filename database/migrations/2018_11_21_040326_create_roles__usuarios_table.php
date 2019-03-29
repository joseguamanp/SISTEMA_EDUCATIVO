<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_rol');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_rol')->references('id')->on('rols');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles__usuarios');
    }
}
