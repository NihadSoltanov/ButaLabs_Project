<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Logo'); // Logo dosyasının yolu
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
