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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('user_name')->nullable();;
            $table->string('user_type')->nullable();;
            $table->string('email')->unique();
            $table->string('password');
            $table->string('last_login')->nullable();;
            $table->text('address')->nullable();;
            $table->string('picture')->nullable();;
            $table->string('mobile')->nullable();;
            $table->string('phone')->nullable();;
            $table->string('gender')->nullable();;
            $table->string('birth_date')->nullable();;
            $table->string('profession')->nullable();;
            $table->string('division')->nullable();;
            $table->string('district')->nullable();;
            $table->string('upzila')->nullable();;
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
