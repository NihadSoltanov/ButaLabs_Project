<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutImagesTable extends Migration
{
    public function up()
    {
        Schema::create('about_images', function (Blueprint $table) {
            $table->id();
            $table->string('media_path'); // Medya dosyasının yolu
            $table->string('media_type'); // Medya türü (image veya video)
            $table->unsignedBigInteger('about_id'); // Foreign key
            $table->foreign('about_id')->references('id')->on('about')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_images');
    }
}
