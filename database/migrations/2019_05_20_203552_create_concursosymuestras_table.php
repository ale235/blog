<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcursosymuestrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursosymuestras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_path');
            $table->string('titulo');
            $table->string('lugar');
            $table->string('anio');
            $table->longText('resenia');
            $table->string('slug');
            $table->integer('orden');
            $table->integer('estado');
            $table->timestamps();
        });

        Schema::create('concursosymuestras_imagens', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('concursosymuestra_id');
            $table->string('titulo');
            $table->string('image_path');
            $table->integer('orden');
            $table->integer('estado');
            $table->timestamps();

            $table->foreign('concursosymuestra_id')
                ->references('id')
                ->on('concursosymuestras')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concursosymuestras_imagens');
        Schema::dropIfExists('concursosymuestras');
    }
}
