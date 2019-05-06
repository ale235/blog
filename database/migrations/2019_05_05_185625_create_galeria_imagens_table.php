<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriaImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_imagens', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('galeria_id');
            $table->string('image_path');
            $table->timestamps();

            $table->foreign('galeria_id')
                ->references('id')
                ->on('galerias')
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
        Schema::dropIfExists('galeria_imagens');
    }
}
