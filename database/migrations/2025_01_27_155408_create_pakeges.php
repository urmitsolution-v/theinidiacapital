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
        Schema::create('pakeges', function (Blueprint $table) {
            $table->id();
            $table->text('category')->nullable();
            $table->text('currency')->nullable();
            $table->text('formate')->nullable();
            $table->text('deac')->nullable();
            $table->text('ammount')->nullable();
            $table->enum('status', ['Y', 'N']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakeges');
    }
};
