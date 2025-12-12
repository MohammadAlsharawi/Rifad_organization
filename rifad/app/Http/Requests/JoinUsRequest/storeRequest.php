<?php

namespace App\Http\Requests\JoinUsRequest;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_en'     => 'required|string|max:255',
            'name_ar'     => 'required|string|max:255',

            'address_en'  => 'required|string|max:255',
            'address_ar'  => 'required|string|max:255',

            'email'     => 'required|email',
            'phone'     => 'nullable|string|max:255',
            'comments'  => 'nullable|string',
            'cv'        => 'nullable|file|mimes:pdf|max:4000',
            'confirmed' => 'required|boolean',
        ];
    }
}
