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
        Schema::create('suggestion', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('tc', 11)->nullable(); // TC kimlik
            $table->date('birthdate')->nullable();
            $table->string('answer_type')->nullable();
            $table->string('email')->nullable();
            $table->enum('gender', ['Erkek', 'Kadın'])->nullable();
            $table->boolean('disability_status')->default(false);
            $table->string('education_status')->nullable();
            $table->string('job')->nullable();
            $table->text('address')->nullable();
            $table->text('content');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggestion');
    }
};
