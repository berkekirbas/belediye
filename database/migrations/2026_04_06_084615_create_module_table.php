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
        Schema::create('module', function (Blueprint $table) {
            $table->id();
            $table->boolean('activity_status')->default(1);
            $table->boolean('notice_status')->default(1);
            $table->boolean('project_status')->default(1);
            $table->boolean('baskan_status')->default(1);
            $table->boolean('baskanmessage_status')->default(1);
            $table->boolean('photo_status')->default(1);
            $table->boolean('contactform_status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module');
    }
};
