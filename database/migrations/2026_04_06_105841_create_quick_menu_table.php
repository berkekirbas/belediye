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
        Schema::create('quick_menu', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->string('language_code', 3)->default('tr');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->enum('open_type', ['_self', '_blank'])->default('_self');
            $table->unsignedBigInteger('page_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_menu');
    }
};
