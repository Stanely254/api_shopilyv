<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id');
            $table->integer('starter');
            $table->text('starter_start_date');
            $table->text('starter_end_date');
            $table->integer('starter_status')->default(1);
            $table->integer('premium')->default(0);
            $table->text('premium_start_date')->nullable();
            $table->text('premium_end_date')->nullable();
            $table->integer('premium_status')->default(0);
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
        Schema::dropIfExists('user_plans');
    }
}