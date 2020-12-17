<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->integer('type_id');
            $table->integer('size');
            $table->integer('valve');
            $table->integer('power');
            $table->integer('transmission_id');
            $table->integer('drive_id');
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
        Schema::dropIfExists('motors');
    }
}
