<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('ruTitle', 300)->unique();
            $table->string('tjTitle', 300)->unique();
            $table->string('enTitle', 300)->unique();
            $table->text('ruBody');
            $table->text('tjBody');
            $table->text('enBody');
            $table->string('image');
            $table->boolean('inner');
            $table->string('url', 300);
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
        Schema::dropIfExists('news');
    }
}
