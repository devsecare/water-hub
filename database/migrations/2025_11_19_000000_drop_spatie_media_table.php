<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * This migration drops the old Spatie Media Library table
     * so that Curator can create its own media table structure.
     */
    public function up(): void
    {
        // Drop the old Spatie Media Library table
        Schema::dropIfExists('media');
    }

    /**
     * Reverse the migrations.
     * 
     * Note: This will recreate the Spatie structure if you need to rollback.
     * However, you should only use this if you're reverting to Spatie.
     */
    public function down(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();

            $table->morphs('model');
            $table->uuid()->nullable()->unique();
            $table->string('collection_name');
            $table->string('name');
            $table->string('file_name');
            $table->string('mime_type')->nullable();
            $table->string('disk');
            $table->string('conversions_disk')->nullable();
            $table->unsignedBigInteger('size');
            $table->json('manipulations');
            $table->json('custom_properties');
            $table->json('generated_conversions');
            $table->json('responsive_images');
            $table->unsignedInteger('order_column')->nullable()->index();

            $table->nullableTimestamps();
        });
    }
};

