<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropHomePageImagesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('home_page_images');
    }

    public function down()
    {
        Schema::create('home_page_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_page_id');
            $table->string('image_path');
            $table->timestamps();
            $table->foreign('home_page_id')->references('id')->on('home_pages')->onDelete('cascade');
        });
    }
}
