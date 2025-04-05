<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePagesTable extends Migration
{
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('MainText');
            $table->string('SubMainText')->nullable();
            $table->string('DescriptionTitle')->nullable();
            $table->string('ShortDescription')->nullable();
            $table->text('Description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_pages');
    }
}
