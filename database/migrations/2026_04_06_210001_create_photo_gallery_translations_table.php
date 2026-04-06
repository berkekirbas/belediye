<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photo_gallery_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('photo_gallery_id')->constrained('photo_galleries')->cascadeOnDelete();
            $table->string('language_code', 5)->default('tr');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->longText('content')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photo_gallery_translations');
    }
};
