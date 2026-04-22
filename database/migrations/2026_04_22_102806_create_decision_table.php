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
        Schema::create('decision', function (Blueprint $table) {
            $table->id();
            $table->string('title');           // Başlık
            $table->string('filename')->nullable(); // Dosya yolu / adı
            $table->boolean('is_active')->default(1); // Aktif/Pasif
            $table->tinyInteger('month')->unsigned();      // 1-12 arası
            $table->softDeletes();             // deleted_at
            $table->timestamps();              // created_at / updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decision');
    }
};
