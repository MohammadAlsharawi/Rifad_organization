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
        Schema::create('online_arabic_paths', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male','female'])->nullable();
            $table->string('grade')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('residence_country')->nullable();

            $table->foreignId('speaks_arabic_id')->constrained('speaks_arabics');
            $table->foreignId('reading_level_id')->constrained('reading_levels');
            $table->foreignId('home_language_id')->constrained('home_languages');
            $table->foreignId('friends_language_id')->constrained('friend_languages');
            $table->foreignId('school_type_id')->constrained('school_types');
            $table->foreignId('preferred_sections_id')->constrained('preferred_sections');
            $table->foreignId('biggest_challenge_id')->constrained('challenges');
            $table->foreignId('parent_reason_id')->constrained('parent_reasons');
            $table->foreignId('preferred_time_id')->constrained('preferred_times');

            $table->boolean('has_difficulty')->nullable();
            $table->text('difficulty_details')->nullable();
            $table->text('notes')->nullable();
            $table->string('how_found_us')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online_arabic_paths');
    }
};
