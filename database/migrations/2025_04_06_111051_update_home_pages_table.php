<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHomePagesTable extends Migration
{
    public function up()
    {
        Schema::table('home_pages', function (Blueprint $table) {
            // Gereksiz sütunları sil
            $table->dropColumn(['MainText', 'SubMainText', 'DescriptionTitle', 'ShortDescription']);
            // Mevcut 'Description' sütununun adını 'description' olarak değiştir
            $table->renameColumn('Description', 'description');
            // Yeni 'title' sütununu ekle
            $table->string('title')->after('id');
        });
    }

    public function down()
    {
        Schema::table('home_pages', function (Blueprint $table) {
            // Geri alma işlemi için sütunları tekrar ekle
            $table->string('MainText', 255)->nullable();
            $table->string('SubMainText', 255)->nullable();
            $table->string('DescriptionTitle', 255)->nullable();
            $table->string('ShortDescription', 255)->nullable();
            // 'description' sütununu 'Description' olarak geri çevir
            $table->renameColumn('description', 'Description');
            // 'title' sütununu sil
            $table->dropColumn('title');
        });
    }
}
