<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('mark_id');
            $table->integer('complect_id');
            $table->integer('color_id');
            $table->integer('delivery_id');
            $table->integer('author_id');
            $table->integer('marker_id');
            $table->integer('year');
            $table->string('vin');
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
        Schema::dropIfExists('cars');
    }
}
