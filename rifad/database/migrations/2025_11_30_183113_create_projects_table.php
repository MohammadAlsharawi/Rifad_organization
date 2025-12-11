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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->json('reason')->nullable();
            $table->decimal('total_amount', 12, 2);
            $table->decimal('secured_amount', 12, 2)->default(0);
            $table->enum('status',['completed','in_progress','failed'])->default('in_progress');
            $table->enum('category',['campaigns','initiative']);
            $table->foreignId('organization_id')->constrained('organizations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
