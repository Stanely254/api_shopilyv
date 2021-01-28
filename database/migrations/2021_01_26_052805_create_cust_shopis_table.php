<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustShopisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custshopi', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('activation_code')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('verification_status')->default(0);
            $table->string('user_otp')->nullable();
            $table->string('user_avatar')->nullable();
            $table->string('industry');
            $table->bigInteger('user_id');
            $table->string('wheretosell');
            $table->string('salesestimation');
            $table->integer('terms_agreement')->default(0);
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
        Schema::dropIfExists('cust_shopis');
    }
}