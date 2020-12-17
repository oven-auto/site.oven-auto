<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->integer('brand_id');
            $table->string('slug');
            $table->string('prefix')->nullable();
            $table->string('banner',250);
            $table->string('alpha',250);
            $table->string('icon',250);

            $table->string('slogan',250);
            $table->text('description');

            $table->integer('body_id');
            $table->integer('country_id');

            $table->integer('sort');
            $table->boolean('status');

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
        Schema::dropIfExists('marks');
    }
}
