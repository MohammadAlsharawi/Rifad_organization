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
        Schema::create('join_uses', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->string('email');
            $table->json('address')->nullable();
            $table->string('phone')->nullable();
            $table->longText('comments')->nullable();
            $table->string('cv')->nullable(); // file path
            $table->boolean('confirmed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('join_uses');
    }
};
