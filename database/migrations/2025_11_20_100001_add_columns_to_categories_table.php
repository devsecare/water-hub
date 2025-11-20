<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Adds icon, image_id, and parent_id columns to categories table
     * for hierarchical categories and image support.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('color');
            
            // Add image_id column
            $table->unsignedBigInteger('image_id')->nullable()->after('icon');
            
            // Add parent_id column
            $table->unsignedBigInteger('parent_id')->nullable()->after('image_id');
            
            // Add foreign key constraints if tables exist
            if (Schema::hasTable('media')) {
                $table->foreign('image_id')->references('id')->on('media')->onDelete('set null');
            }
            
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            
            // Add index for parent_id for better query performance
            $table->index('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['image_id']);
            $table->dropForeign(['parent_id']);
            $table->dropIndex(['parent_id']);
            $table->dropColumn(['icon', 'image_id', 'parent_id']);
        });
    }
};

