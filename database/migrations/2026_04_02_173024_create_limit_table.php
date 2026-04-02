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
        Schema::create('limit', function (Blueprint $table) {
            $table->id();
            $table->integer('project_limit')->default(0);
            $table->integer('news_limit')->default(0);
            $table->integer('notice_limit')->default(0);
            $table->integer('photo_limit')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('limit');
    }
};
