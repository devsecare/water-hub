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
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('sort')->default(0)->after('parent_id');
        });
        
        // Set initial sort values based on creation order
        $categories = \DB::table('categories')->orderBy('id')->get();
        foreach ($categories as $index => $category) {
            \DB::table('categories')
                ->where('id', $category->id)
                ->update(['sort' => $index + 1]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('sort');
        });
    }
};
