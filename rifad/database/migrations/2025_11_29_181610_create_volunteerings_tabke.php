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
        Schema::create('volunteerings', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->string('email');
            $table->enum('gender', ['male','female'])->nullable();
            $table->json('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('age')->nullable();

            $table->foreignId('qualification_id')->constrained('qualifications');
            $table->foreignId('preferred_type_id')->constrained('volunteer_types');

            $table->boolean('photo_consent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteerings_tabke');
    }
};
