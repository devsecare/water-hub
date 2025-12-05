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
        // Drop foreign key constraint from download_logs table
        Schema::table('download_logs', function (Blueprint $table) {
            $table->dropForeign(['file_id']);
        });

        // Drop the files table
        Schema::dropIfExists('files');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recreate files table
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Storage filename
            $table->string('original_name'); // Original filename
            $table->string('path'); // Storage path
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->default(0); // Size in bytes
            $table->unsignedInteger('download_count')->default(0);
            $table->timestamps();
            
            $table->index('item_id');
        });

        // Recreate foreign key constraint
        Schema::table('download_logs', function (Blueprint $table) {
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
        });
    }
};
