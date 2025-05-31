<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('country_content_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_content_id')->constrained('country_contents')->onDelete('cascade');
            $table->enum('type', ['title', 'paragraph', 'image', 'video']);
            $table->text('content')->nullable(); // for title or paragraph
            $table->string('media_path')->nullable(); // for image or video
            $table->unsignedInteger('order')->default(0); // for sorting
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('country_content_blocks');
    }
};
