<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplect extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('mark_id');
            $table->integer('motor_id');
            $table->integer('price');
            $table->string('code');
            $table->integer('parent_id')->nullable();
            $table->integer('sort')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('complects');
    }
}
