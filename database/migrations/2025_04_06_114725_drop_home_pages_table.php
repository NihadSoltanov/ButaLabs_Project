<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropHomePagesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('home_pages');
    }

    public function down()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
    }
}
