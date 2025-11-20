<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Fixes the file_name column to be nullable if the table already exists.
     */
    public function up(): void
    {
        if (Schema::hasTable('media') && Schema::hasColumn('media', 'file_name')) {
            // Use raw SQL to modify the column (doesn't require doctrine/dbal)
            DB::statement('ALTER TABLE `media` MODIFY COLUMN `file_name` VARCHAR(255) NULL');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('media') && Schema::hasColumn('media', 'file_name')) {
            // Revert to NOT NULL (though this might fail if there are NULL values)
            DB::statement('ALTER TABLE `media` MODIFY COLUMN `file_name` VARCHAR(255) NOT NULL');
        }
    }
};

