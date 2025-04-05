<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMediaTable extends Migration
{
    public function up()
    {
        Schema::create('project_media', function (Blueprint $table) {
            $table->id();
            $table->string('MediaURL');
            $table->unsignedBigInteger('ProjectId'); // Foreign key
            $table->foreign('ProjectId')->references('id')->on('portfolios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_media');
    }
}
