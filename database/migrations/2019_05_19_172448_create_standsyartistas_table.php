<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandsyartistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standsyartistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_path');
            $table->string('nombre');
            $table->string('slug');
            $table->string('instagram');
            $table->string('facebook');
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
        Schema::dropIfExists('standsyartistas');
    }
}