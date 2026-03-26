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
        Schema::table('topics', function (Blueprint $table) {
            // $table->index('topic'); // For the search feature
            $table->unique(['department', 'level', 'topic']); // For uniqueness validation and as an index
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            // $table->dropIndex(['topic']);
            $table->dropUnique(['department', 'level', 'topic']);
        });
    }
};
