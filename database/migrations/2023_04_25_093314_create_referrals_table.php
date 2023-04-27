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
    Schema::create('referrals', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('referrer_id');
    $table->unsignedBigInteger('referee_id');
    $table->unsignedBigInteger('package_id');
    $table->decimal('commission', 8, 2)->default(0);
    $table->timestamps();

    $table->foreign('referrer_id')->references('id')->on('users');
    $table->foreign('referee_id')->references('id')->on('users');
    $table->foreign('package_id')->references('id')->on('packages');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
