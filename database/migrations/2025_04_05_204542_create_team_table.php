<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamTable extends Migration
{
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('FullName');
            $table->string('Link')->nullable(); // LinkedIn linki opsiyonel
            $table->string('Image'); // Resim dosyasının yolu
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('team');
    }
}
