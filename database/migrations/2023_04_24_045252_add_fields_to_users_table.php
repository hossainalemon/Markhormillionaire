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
        Schema::table('users', function (Blueprint $table) {
        $table->string('photo')->nullable();
        $table->decimal('withdrawal_balance', 8, 2)->default(0);
        $table->decimal('deposit_balance', 8, 2)->default(0);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['photo', 'withdrawal_balance', 'deposit_balance']);
    });
    }
};
