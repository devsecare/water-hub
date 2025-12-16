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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique()->comment('Setting key (e.g., admin_email, api_key)');
            $table->text('value')->nullable()->comment('Setting value');
            $table->string('type')->default('text')->comment('Type: text, email, password, textarea, number, boolean');
            $table->string('group')->default('general')->comment('Settings group (general, email, api, etc.)');
            $table->string('label')->comment('Human-readable label');
            $table->text('description')->nullable()->comment('Help text/description');
            $table->integer('sort_order')->default(0)->comment('Display order');
            $table->boolean('is_encrypted')->default(false)->comment('Whether the value should be encrypted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
