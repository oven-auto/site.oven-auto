<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCredits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->date('begin_date');
            $table->date('end_date');
            $table->string('banner',300)->nullable();
            $table->string('name');
            $table->decimal('rate');
            $table->integer('pay');
            $table->integer('period');
            $table->integer('contribution');
            $table->text('disclaimer');            
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
        Schema::dropIfExists('credits');
    }
}
