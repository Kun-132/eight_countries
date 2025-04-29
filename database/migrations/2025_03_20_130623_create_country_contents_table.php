<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('country_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->string('section_id'); // Not a foreign key, so it's fine
            $table->string('side_nav_link_name');
            $table->string('title');
            $table->text('paragraph');
            $table->string('media_type');
            $table->string('media_path');
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('country_contents');
    }
};
