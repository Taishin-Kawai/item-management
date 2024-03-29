<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->integer('gender');
            $table->integer('age');
            $table->string('tel',15);     
            $table->string('email')->charset("utf8")->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address');
            $table->string('password');
            $table->dateTime('last_login_at')->nullable();
            $table->dateTime('last_logout_at')->nullable();
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
