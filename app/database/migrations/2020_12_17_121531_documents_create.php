<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocumentsCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->integer('mark_id');
            $table->string('brochure',255)->nullable();
            $table->string('price',255)->nullable();
            $table->string('manual',255)->nullable();
            $table->string('toy',255)->nullable();           
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
        Schema::dropIfExists('documents');
    }
}
