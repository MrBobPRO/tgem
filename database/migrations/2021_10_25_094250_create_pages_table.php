<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string("ruTitle");
            $table->string("tjTitle");
            $table->string("enTitle");
            $table->integer("dropdown_id"); //parent id
            $table->integer("priority");
            $table->boolean("default_template");
            $table->string("url");
            $table->string("image")->nullable();
            $table->text("ruMainText")->nullable();
            $table->text("tjMainText")->nullable();
            $table->text("enMainText")->nullable();
            $table->text("ruAdditionalTextTitle")->nullable();
            $table->text("tjAdditionalTextTitle")->nullable();
            $table->text("enAdditionalTextTitle")->nullable();
            $table->text("ruAdditionalTextBody")->nullable();
            $table->text("tjAdditionalTextBody")->nullable();
            $table->text("enAdditionalTextBody")->nullable();
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
        Schema::dropIfExists('pages');
    }
}
