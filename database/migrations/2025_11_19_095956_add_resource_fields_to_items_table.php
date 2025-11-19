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
        Schema::table('items', function (Blueprint $table) {
            $table->string('publisher')->nullable()->after('description');
            $table->enum('type', ['guide', 'video', 'podcast', 'case_study'])->default('guide')->after('publisher');
            $table->text('short_description')->nullable()->after('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn(['publisher', 'type', 'short_description']);
        });
    }
};
