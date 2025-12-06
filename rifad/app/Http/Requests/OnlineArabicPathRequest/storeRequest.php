<?php

namespace App\Http\Requests\OnlineArabicPathRequest;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name'             => 'required|string|max:255',
            'birth_date'            => 'nullable|date',
            'gender'                => 'nullable|in:male,female',
            'grade'                 => 'nullable|string|max:255',
            'parent_name'           => 'nullable|string|max:255',
            'phone'                 => 'nullable|string|max:255',
            'email'                 => 'nullable|email',
            'origin_country'        => 'nullable|string|max:255',
            'residence_country'     => 'nullable|string|max:255',
            'speaks_arabic_id'      => 'required|exists:speaks_arabics,id',
            'reading_level_id'      => 'required|exists:reading_levels,id',
            'home_language_id'      => 'required|exists:home_languages,id',
            'friends_language_id'   => 'required|exists:friends_languages,id',
            'school_type_id'        => 'required|exists:school_types,id',
            'preferred_sections_id' => 'required|exists:preferred_sections,id',
            'biggest_challenge_id'  => 'required|exists:biggest_challenges,id',
            'parent_reason_id'      => 'required|exists:parent_reasons,id',
            'preferred_time_id'     => 'required|exists:preferred_times,id',
            'has_difficulty'        => 'nullable|boolean',
            'difficulty_details'    => 'nullable|string',
            'notes'                 => 'nullable|string',
            'how_found_us'          => 'nullable|string|max:255',
            'confirmed'             => 'nullable|boolean',
        ];
    }
}
