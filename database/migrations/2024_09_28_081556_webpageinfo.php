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
        Schema::create('webinfo', function (Blueprint $table) {
            $table->id();
            $table->text('info_one')->nullable();
            $table->text('info_two')->nullable();
            $table->text('info_three')->nullable();
            $table->text('image')->nullable();
            $table->text('favicon')->nullable();
            $table->text('image_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinfo');
    }
};
