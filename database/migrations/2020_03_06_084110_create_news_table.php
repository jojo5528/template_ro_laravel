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
        Schema::create('devkurov_news', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('type')->default(1);
            $table->string('image_url');
            $table->text('link_url')->nullable();
            $table->string('title');
            $table->MEDIUMTEXT('desc')->nullable();
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
        Schema::dropIfExists('devkurov_news');
    }
}
