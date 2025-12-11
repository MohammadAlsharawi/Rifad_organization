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
        Schema::create('i_teach_for_syrias', function (Blueprint $table) {
            $table->id();
            $table->json('full_name')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->json('residence')->nullable();
            $table->year('birth_year')->nullable();
            $table->enum('gender', ['male','female'])->nullable();

            $table->foreignId('degree_id')->constrained('degrees');
            $table->foreignId('sector_id')->constrained('sectors');
            $table->foreignId('experience_year_id')->constrained('experience_years');
            $table->foreignId('training_type_id')->constrained('training_types');
            $table->foreignId('need_id')->constrained('needs');
            $table->foreignId('course_id')->constrained('course_names');

            $table->boolean('confirmed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_teach_for_syrias');
    }
};
