<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->integer("priority");
            $table->string("ruCrumb");
            $table->string("tjCrumb");
            $table->string("enCrumb");
            $table->string("ruTitle");
            $table->string("tjTitle");
            $table->string("enTitle");
            $table->text("ruDescription");
            $table->text("tjDescription");
            $table->text("enDescription");
            $table->string("image");
            $table->string("link")->nullable();
            $table->string("video")->nullable();
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
        Schema::dropIfExists('sliders');
    }
}