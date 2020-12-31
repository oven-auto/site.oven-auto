<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarProdactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_prodactions', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->string('order_number',250);
            $table->date('order_date');
            $table->date('build_date');
            $table->date('ready_date');
            $table->date('ship_date');
            $table->integer('user_id');
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
        Schema::dropIfExists('car_prodactions');
    }
}
