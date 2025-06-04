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
        Schema::table('log_access', function (Blueprint $table) {
            $table->string('user_agent', 512)->nullable()->after('route');
            $table->string('method', 20)->nullable()->after('user_agent');
            $table->text('referer')->nullable()->after('method');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('log_access', function (Blueprint $table) {
            $table->dropColumn(['user_agent', 'method', 'referer']);
        });
    }
};
