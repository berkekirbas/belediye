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

            $table->string('title')->nullable();
            $table->string('url')->nullable();

            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('orta_banner')->nullable();

            $table->string('baskan_photo')->nullable();
            $table->string('baskan_fullname')->nullable();

            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();

            $table->text('google_maps')->nullable();
            $table->text('google_analytics')->nullable();

            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();

            $table->string('copyright')->nullable();

            $table->text('privacy_policy')->nullable(); // gizlilik metni
            $table->text('kvkk')->nullable();

            $table->boolean('suggestion_status')->default(1);
            $table->boolean('site_status')->default(1);

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
