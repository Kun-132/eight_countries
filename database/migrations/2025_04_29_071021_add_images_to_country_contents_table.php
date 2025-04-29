<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('country_contents', function (Blueprint $table) {
            $table->string('image1')->nullable()->after('media_path');
            $table->string('image2')->nullable()->after('image1');
        });
    }

    public function down()
    {
        Schema::table('country_contents', function (Blueprint $table) {
            $table->dropColumn(['image1', 'image2']);
        });
    }
};
