<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_path');
            $table->string('nombre');
            $table->string('texto_uno');
            $table->string('texto_dos');
            $table->string('slug');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('twitter');
            $table->integer('orden');
            $table->integer('estado');
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
        Schema::dropIfExists('miembros');
    }
}
