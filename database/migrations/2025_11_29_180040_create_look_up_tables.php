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
        // Degrees
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Sectors
        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Experience Years
        Schema::create('experience_years', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Training Types
        Schema::create('training_types', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Needs
        Schema::create('needs', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Courses
        Schema::create('course_names', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Residences
        Schema::create('residences', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Languages
        Schema::create('speaks_arabics', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Reading Levels
        Schema::create('reading_levels', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });
        Schema::create('home_languages', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });
        Schema::create('friend_languages', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });
        // School Types
        Schema::create('school_types', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Preferred Types
        Schema::create('preferred_sections', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Challenges
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Parent Reasons
        Schema::create('parent_reasons', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Preferred Times
        Schema::create('preferred_times', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Qualifications
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });

        // Volunteer Types
        Schema::create('volunteer_types', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();

        });

        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degrees');
        Schema::dropIfExists('sectors');
        Schema::dropIfExists('experience_years');
        Schema::dropIfExists('training_types');
        Schema::dropIfExists('needs');
        Schema::dropIfExists('course_names');
        Schema::dropIfExists('residences');
        Schema::dropIfExists('speaks_arabics');
        Schema::dropIfExists('reading_levels');
        Schema::dropIfExists('home_languages');
        Schema::dropIfExists('friend_languages');
        Schema::dropIfExists('school_types');
        Schema::dropIfExists('preferred_sections');
        Schema::dropIfExists('challenges');
        Schema::dropIfExists('parent_reasons');
        Schema::dropIfExists('preferred_times');
        Schema::dropIfExists('qualifications');
        Schema::dropIfExists('volunteer_types');
    }
};
