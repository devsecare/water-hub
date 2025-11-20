<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Adds new columns to items table and changes featured_image_path to featured_image_id
     */
    public function up(): void
    {
        Schema::table('items', function (Blueprint $table) {
            // Add new columns
            $table->string('publisher')->nullable()->after('description');
            $table->string('type')->default('guide')->after('publisher');
            $table->text('short_description')->nullable()->after('type');
            
            // Drop old featured_image_path column if it exists
            if (Schema::hasColumn('items', 'featured_image_path')) {
                $table->dropColumn('featured_image_path');
            }
            
            // Add new featured_image_id column
            if (!Schema::hasColumn('items', 'featured_image_id')) {
                $table->foreignId('featured_image_id')->nullable()->after('address')->constrained('media')->onDelete('set null');
            }
            
            // Add index for type for better query performance
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            // Drop foreign key and column
            if (Schema::hasColumn('items', 'featured_image_id')) {
                $table->dropForeign(['featured_image_id']);
                $table->dropColumn('featured_image_id');
            }
            
            // Recreate old column
            if (!Schema::hasColumn('items', 'featured_image_path')) {
                $table->string('featured_image_path')->nullable()->after('address');
            }
            
            // Drop new columns
            $table->dropIndex(['type']);
            $table->dropColumn(['publisher', 'type', 'short_description']);
        });
    }
};

