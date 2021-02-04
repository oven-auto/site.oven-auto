<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyControlls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_controlls', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->boolean('timer');
            $table->string('link',260);
            $table->string('promo',250);
            $table->string('name',250);
            $table->string('title',300);
            $table->text('offer');
            $table->text('text');
            $table->integer('scenario_id');
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
        Schema::dropIfExists('company_controlls');
    }
}
