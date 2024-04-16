<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_offers', function (Blueprint $table) {
            $table->id();
            $table->string('wifi');
            $table->string('bathtub');
            $table->string('tv');
            $table->string('meals');
            $table->string('cleaning');
            $table->string('parking');
            $table->string('beach_view');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_offers');
    }
};
