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
        Schema::create('labibs', function (Blueprint $table) {
            $table->id();
            $table->json('full_name')->nullable();
            $table->json('province')->nullable();
            $table->integer('grade');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->json('course')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labibs');
    }
};
