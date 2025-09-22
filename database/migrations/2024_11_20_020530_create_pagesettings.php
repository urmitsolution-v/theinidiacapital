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
        Schema::create('pagesettings', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('pagename')->nullable();
            $table->text('bradcump_title')->nullable();
            $table->text('description')->nullable();
            $table->text('meta')->nullable();
            $table->text('tag')->nullable();
            $table->text('meta_d')->nullable();
            $table->text('image')->nullable();
            $table->enum('status', ['Y', 'N']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagesettings');
    }
};
