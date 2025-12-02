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
        Schema::table('download_logs', function (Blueprint $table) {
            // Make file_id nullable to support media downloads
            $table->foreignId('file_id')->nullable()->change();

            // Add media_id column
            $table->foreignId('media_id')->nullable()->after('file_id')->constrained('media')->onDelete('cascade');

            // Add index for media downloads
            $table->index(['media_id', 'downloaded_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('download_logs', function (Blueprint $table) {
            $table->dropForeign(['media_id']);
            $table->dropIndex(['media_id', 'downloaded_at']);
            $table->dropColumn('media_id');
            $table->foreignId('file_id')->nullable(false)->change();
        });
    }
};
