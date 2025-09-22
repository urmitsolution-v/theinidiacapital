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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->text('password')->nullable();
            $table->text('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('image')->nullable();
            $table->text('company_name')->nullable();
            $table->text('company_address')->nullable();
            $table->text('gstin')->nullable();
            $table->text('domain')->nullable();
            $table->text('codeid')->nullable();
            $table->text('team_type')->nullable();
            $table->text('job_title')->nullable();
            $table->string('referral_code')->unique()->nullable();
            $table->string('referred_by')->nullable();            
            $table->text('customer_type_id')->nullable();
            $table->enum('is_block', ['N','Y']);
            $table->enum('role', ['user','hrms','crm','team','superadmin']);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
             $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
