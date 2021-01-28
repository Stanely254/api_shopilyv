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
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone')->unique();
            $table->string('gender');
            $table->integer('level')->default(0);
            $table->string('type')->nullable();
            $table->integer('assistant')->default(0);
            $table->string('location')->nullable();
            $table->string('background')->nullable();
            $table->string('logged')->nullable();
            $table->string('company_id');
            $table->string('token', 255)->nullable();
            $table->string('ip')->nullable();
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