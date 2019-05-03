<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_role_name');
            $table->string('user_role_slug');
            $table->timestamps();
        });

        Schema::create('users_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_status_name');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar');
            $table->unsignedInteger('user_status_id');
            $table->unsignedInteger('user_role_id');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('user_status_id')
                ->references('id')
                ->on('users_status')
                ->onDelete('cascade');

            $table->foreign('user_role_id')
                ->references('id')
                ->on('users_roles')
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
        Schema::drop('users');
        Schema::drop('users_roles');
        Schema::drop('users_status');

    }
}
