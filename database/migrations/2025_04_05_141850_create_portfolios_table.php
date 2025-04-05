<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('Heading');
            $table->string('SubHeading')->nullable();
            $table->text('About')->nullable();
            $table->string('Link')->nullable();
            $table->unsignedBigInteger('ServiceID'); // Foreign key
            $table->foreign('ServiceID')->references('id')->on('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
