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
            $table->string("title");
            $table->integer("dropdown_id"); //parent id
            $table->integer("priority");
            $table->boolean("default_template");
            $table->string("url");
            $table->string("image")->nullable();
            $table->text("main_text")->nullable();
            $table->text("additional_text_title")->nullable();
            $table->text("additional_text_body")->nullable();
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
