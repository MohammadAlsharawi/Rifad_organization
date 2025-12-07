<?php

namespace App\Http\Requests\VolunteeringRequest;

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
            'name'              => 'required|string|max:255',
            'email'             => 'required|email',
            'gender'            => 'nullable|in:male,female',
            'address'           => 'nullable|string|max:255',
            'phone'             => 'nullable|string|max:255',
            'age'               => 'nullable|integer|min:0',
            'qualification_id'  => 'required|exists:qualifications,id',
            'preferred_type_id' => 'required|exists:volunteer_types,id',
            'photo_consent'     => 'required|boolean',
        ];
    }
}
