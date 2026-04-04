<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('main_menu', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id')->nullable()->after('open_type');
        });
    }

    public function down(): void
    {
        Schema::table('main_menu', function (Blueprint $table) {
            $table->dropColumn('page_id');
        });
    }
};
