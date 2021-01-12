<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReceivingCar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_receivings', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->date('accept_stock_date')->nullable();
            $table->date('pre_sale_date')->nullable();
            $table->integer('receiver_id')->nullable();
            $table->string('receipt_number')->nullable();
            $table->date('receipt_date')->nullable();
            $table->integer('provision_id')->nullable();

            $table->date('pts_pay_date')->nullable();
            $table->date('pts_receipt_date')->nullable();
            $table->date('pts_debiting_date')->nullable();
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
        Schema::dropIfExists('car_receivings');
    }
}
