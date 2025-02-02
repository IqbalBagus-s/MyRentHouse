<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail');
            $table->text('about');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->boolean('is_available');
            $table->boolean('is_fully_booked');
            $table->unsignedInteger('price');
            $table->unsignedInteger('duration');
            $table->string('address');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('houses');
    }
};

