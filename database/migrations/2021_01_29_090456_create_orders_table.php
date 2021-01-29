<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('bill_no');
            $table->string('customer_name');
            $table->string('customer_address')->nullable();
            $table->string('customer_phone');
            $table->string('date_time');
            $table->string('service_charge_rate')->default('0');
            $table->string('service_charge')->default('0');
            $table->string('vat_charge_rate')->default('0');
            $table->string('vat_charge')->default('0');
            $table->string('net_amount');
            $table->string('o_net');
            $table->string('discount');
            $table->string('free_delivery')->nullable();
            $table->string('delfee')->nullable();
            $table->string('paid_status')->nullable();
            $table->string('user_id')->nullable();
            $table->string('priority')->nullable();
            $table->string('packed')->nullable();
            $table->integer('assigned')->default(0);
            $table->integer('exchange')->nullable();
            $table->string('shared')->nullable();
            $table->string('location')->nullable();
            $table->string('landmark')->nullable();
            $table->string('type')->nullable();
            $table->string('partial')->nullable();
            $table->string('partial_amount')->default(0);
            $table->string('partial_pay')->nullable();
            $table->string('partial_pay_cash')->nullable();
            $table->integer('store_credit')->default(0);
            $table->string('partial_location')->nullable();
            $table->string('partial_user_id')->nullable();
            $table->string('partial_shift_id')->nullable();
            $table->string('partial_dt')->nullable();
            $table->string('eqCode')->nullable();
            $table->string('partial_eqCode')->nullable();
            // $table->string('invoice_no');
            // $table->string('receipt_no');
            // $table->string('shift_id')->nullable();
            // //$table->timestamp('added_date');
            // $$table->integer('cancel_order')->default(0);
            // $table->integer('add_order')->default(0);
            // $table->integer('archive')->default(0);
            // $table->string('company_id');
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
        Schema::dropIfExists('orders');
    }
}