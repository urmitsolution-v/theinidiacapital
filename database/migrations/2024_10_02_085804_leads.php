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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('name_title')->nullable();
            $table->text('name')->nullable();
            $table->text('phone_type')->nullable();
            $table->text('telephone')->nullable();
            $table->text('email')->nullable();
            $table->text('lead_value')->nullable();
            $table->text('assigned_name')->nullable();
            $table->text('notes')->nullable();
            $table->text('course')->nullable();
            $table->text('category')->nullable();
            $table->text('tags')->nullable();
            $table->text('last_contact')->nullable();
            $table->text('total_budget')->nullable();
            $table->text('content_type')->nullable();
            $table->text('brand_name')->nullable();
            $table->text('company_name')->nullable();
            $table->text('street_address')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->text('zip_code')->nullable();
            $table->text('country')->nullable();
            $table->text('website')->nullable();
            $table->date('target_date')->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
