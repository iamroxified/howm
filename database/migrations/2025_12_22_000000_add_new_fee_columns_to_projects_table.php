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
        Schema::table('projects', function (Blueprint $table) {
            $table->decimal('supervisor_fee', 8, 2)->nullable()->after('balance');
            $table->decimal('amt_paid_to_supervisor', 8, 2)->nullable()->after('supervisor_fee');
            $table->decimal('developer_fee', 8, 2)->nullable()->after('amt_paid_to_supervisor');
            $table->decimal('amt_paid_to_developer', 8, 2)->nullable()->after('developer_fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['supervisor_fee', 'amt_paid_to_supervisor', 'developer_fee', 'amt_paid_to_developer']);
        });
    }
};
