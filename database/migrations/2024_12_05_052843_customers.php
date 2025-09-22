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
        Schema::create('cusotmers', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->string('mobile')->nullable();
            $table->date('dob')->nullable();
            $table->date('delivery_date')->nullable();
            $table->text('bill_number')->nullable();
            $table->date('order_date')->nullable();
            $table->text('salesman_code')->nullable();
            $table->string('gst')->nullable();
            $table->string('fabrics')->nullable();
            $table->string('quantity')->nullable();
            $table->string('amount')->nullable();
            $table->string('total_quantity')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('discount')->nullable();
            $table->string('advance')->nullable();
            $table->date('advance_date')->nullable();
            $table->string('balance')->nullable();
            $table->string('receive')->nullable();
            $table->date('receive_date')->nullable();
            $table->longText('top_data')->nullable();
            $table->longText('bottom_data')->nullable();
            $table->longText('fabric_image')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
