<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activity_translations', function (Blueprint $table) {

            $table->id();
            $table->string('language_code', 3)->default('tr');
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('location')->nullable();
            $table->foreignId('activity_id')->constrained('activity')->cascadeOnDelete();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_translations');
    }
};
