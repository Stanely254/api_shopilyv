<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku');
            $table->integer('cost')->default(0);
            $table->integer('price')->default(0);
            $table->integer('dprice');
            $table->string('per')->default(1);
            $table->integer('discode')->nullable();
            $table->integer('discount')->default(0);
            $table->integer('qty')->default(0);
            $table->string('image');
            $table->string('description');
            $table->string('attribute_value_id')->nullable();
            $table->string('brand_id');
            $table->string('category_id');
            $table->integer('store_id');
            $table->integer('availability');
            $table->string('sizes')->nullable();
            $table->string('colour')->nullable();
            $table->string('weight')->nullable();
            $table->string('colour_group')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('quantity1')->default(0);
            $table->integer('quantity2')->default(0);
            $table->integer('quantity3')->default(0);
            $table->string('stock_status')->default(1);
            $table->integer('trending')->default(0);
            $table->integer('trend_order')->default(99999);
            $table->string('date_stocked')->default(time());
            $table->string('company_id');
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
        Schema::dropIfExists('products');
    }
}