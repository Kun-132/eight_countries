<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique(); // for routing and easy reference
            $table->timestamps();
        });

        // Insert default countries
        DB::table('countries')->insert([
            ['name' => 'Myanmar', 'slug' => 'myanmar'],
            ['name' => 'Cambodia', 'slug' => 'cambodia'],
            ['name' => 'Indonesia', 'slug' => 'indonesia'],
            ['name' => 'India', 'slug' => 'india'],
            ['name' => 'Philippines', 'slug' => 'philippines'],
            ['name' => 'Japan', 'slug' => 'japan'],
            ['name' => 'Nepal', 'slug' => 'nepal'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
