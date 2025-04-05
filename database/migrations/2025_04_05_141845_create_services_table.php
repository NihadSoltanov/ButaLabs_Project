<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('shortDesc')->nullable();
            $table->string('AboutTitle')->nullable();
            $table->text('AboutText')->nullable();
            $table->unsignedBigInteger('ServiceIconId'); // Foreign key
            $table->foreign('ServiceIconId')->references('id')->on('service_icons')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
