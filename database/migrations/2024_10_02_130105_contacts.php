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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('name_title')->nullable();
            $table->text('name')->nullable();
            $table->text('accounts_name')->nullable();
            $table->text('phone_type')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('address')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();
            $table->text('zip_code')->nullable();
            $table->text('date_of_birth')->nullable();
            $table->text('status')->nullable();
            $table->text('remarks')->nullable();
            $table->text('description')->nullable();
            $table->text('time_next_follow_up')->nullable();
            $table->text('date_next_follow_up')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
