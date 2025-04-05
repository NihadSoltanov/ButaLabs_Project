<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceIconsTable extends Migration
{
    public function up()
    {
        Schema::create('service_icons', function (Blueprint $table) {
            $table->id();
            $table->string('IconName');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_icons');
    }
}
