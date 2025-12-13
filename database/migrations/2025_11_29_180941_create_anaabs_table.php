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
        Schema::create('anaabs', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->foreignId('residence_id')->constrained('residences');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anaabs');
    }
};
