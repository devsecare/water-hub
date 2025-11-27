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
        Schema::create('slider_cards', function (Blueprint $table) {
            $table->id();
            $table->text('title'); // Main title (can be multiline)
            $table->string('icon')->nullable()->default('chat'); // Material Symbols icon name
            $table->string('subtitle_line_1')->nullable(); // First line of subtitle
            $table->string('subtitle_line_2')->nullable(); // Second line of subtitle
            $table->boolean('has_expandable')->default(false); // Whether card has expandable content
            $table->string('expandable_title')->nullable(); // Title for expandable section
            $table->json('expandable_items')->nullable(); // Array of bullet points
            $table->integer('sort_order')->default(0); // Display order
            $table->boolean('is_active')->default(true); // Show/hide card
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_cards');
    }
};
