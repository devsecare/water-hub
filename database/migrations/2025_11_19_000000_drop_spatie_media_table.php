<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $driver = DB::getDriverName();
        
        if ($driver === 'mysql') {
            // MySQL: Disable FK checks temporarily
            DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

            // Drop any foreign keys referencing the media table
            $foreignKeys = DB::select("
                SELECT TABLE_NAME, CONSTRAINT_NAME
                FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                WHERE REFERENCED_TABLE_NAME = 'media'
                  AND CONSTRAINT_SCHEMA = DATABASE()
            ");

            foreach ($foreignKeys as $fk) {
                try {
                    Schema::table($fk->TABLE_NAME, function (Blueprint $table) use ($fk) {
                        $table->dropForeign($fk->CONSTRAINT_NAME);
                    });
                } catch (\Exception $e) {
                    // Ignore if foreign key doesn't exist
                }
            }

            // Now safely drop the media table
            Schema::dropIfExists('media');

            // Re-enable FK checks
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        } else {
            // SQLite: Just drop the table if it exists
            Schema::dropIfExists('media');
        }
    }

    /**
     * Reverse the migrations.
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
