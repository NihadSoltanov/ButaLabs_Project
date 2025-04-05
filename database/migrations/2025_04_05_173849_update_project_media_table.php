<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProjectMediaTable extends Migration
{
    public function up()
    {
        Schema::table('project_media', function (Blueprint $table) {
            // Mevcut sütunları kontrol et ve gerekirse sil
            if (Schema::hasColumn('project_media', 'MediaURL')) {
                $table->dropColumn('MediaURL');
            }

            if (Schema::hasColumn('project_media', 'ProjectId')) {
                $table->renameColumn('ProjectId', 'portfolio_id');
            }

            // Yeni sütunları ekle
            $table->string('media_path')->after('id'); // Medya dosyasının yolu
            $table->string('media_type')->after('media_path'); // Medya türü (image veya video)
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('project_media', function (Blueprint $table) {
            $table->dropForeign(['portfolio_id']);
            $table->dropColumn(['media_path', 'media_type']);
            $table->renameColumn('portfolio_id', 'ProjectId');
            $table->string('MediaURL')->nullable();
        });
    }
}
