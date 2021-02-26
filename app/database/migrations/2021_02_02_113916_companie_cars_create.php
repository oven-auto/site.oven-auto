<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompanieCarsCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_cars', function (Blueprint $table) {
            $table->id();
            $table->integer('comany_id');
            $table->string('vin',17);
            $table->integer('mark_id');
            $table->integer('complect_id');
            $table->integer('transmission_id');
            $table->integer('driver_id');
            $table->integer('delivery_id');
            $table->integer('min_price');
            $table->integer('max_price');
            $table->integer('year');
            $table->boolean('type');
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
        Schema::dropIfExists('company_cars');
    }
}
