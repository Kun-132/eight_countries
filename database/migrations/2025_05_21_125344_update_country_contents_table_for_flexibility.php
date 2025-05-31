<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('country_contents', function (Blueprint $table) {
            $table->dropColumn(['paragraph', 'media_type', 'media_path', 'image1', 'image2']);
        });
    }

    public function down()
    {
        Schema::table('country_contents', function (Blueprint $table) {
            $table->text('paragraph');
            $table->string('media_type');
            $table->string('media_path');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
        });
    }
};
