<?php

namespace App\Http\Requests\ITechForSyriaRequests;

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
            'full_name'           => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'email'               => 'required|email',
            'residence'           => 'required|string|max:255',
            'birth_year'          => 'required|integer|min:1900|max:' . date('Y'),
            'gender'              => 'required|in:male,female',
            'degree_id'           => 'required|exists:degrees,id',
            'sector_id'           => 'required|exists:sectors,id',
            'experience_year_id'  => 'required|exists:experience_years,id',
            'training_type_id'    => 'required|exists:training_types,id',
            'need_id'             => 'required|exists:needs,id',
            'course_id'           => 'required|exists:courses,id',
            'confirmed'           => 'required|boolean',
        ];
    }
}
