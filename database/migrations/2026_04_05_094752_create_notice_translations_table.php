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
        Schema::create('notice_translations', function (Blueprint $table) {
            $table->id();
            $table->string('language_code', 3)->default('tr');
            $table->string('title');
            $table->text('content')->nullable();
            $table->foreignId('notice_id')->constrained('notice')->cascadeOnDelete();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notice_translations');
    }
};
