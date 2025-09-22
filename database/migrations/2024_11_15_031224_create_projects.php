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


        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->text('project_name')->nullable();
            $table->text('date')->nullable();
            $table->text('loction')->nullable();
            $table->text('category')->nullable();
            $table->text('image')->nullable();
            $table->text('category')->nullable();
            $table->text('s_description')->nullable();
            $table->text('l_description')->nullable();
            $table->text('s_description1')->nullable();
            $table->text('l_description1')->nullable();
            $table->text('image1')->nullable();
            $table->text('s_description2')->nullable();
            $table->text('l_description2')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_tags')->nullable();
            $table->text('meta_description')->nullable();
            $table->enum('status', ['Y', 'N']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
