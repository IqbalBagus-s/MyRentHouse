<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('booking_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->string('booking_trx');
            $table->unsignedInteger('total_amount');
            $table->unsignedInteger('duration');
            $table->date('started_at');
            $table->date('ended_at');
            $table->boolean('is_paid');
            $table->foreignId('house_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('booking_transactions');
    }
};
