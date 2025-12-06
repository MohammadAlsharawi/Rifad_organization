<?php

namespace App\Http\Requests\LabibRequest;

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
            'full_name' => 'required|string|max:255',
            'province'  => 'required|string|max:255',
            'grade'     => 'required|string|max:255',
            'email'     => 'nullable|email',
            'phone'     => 'nullable|string|max:255',
            'course'    => 'nullable|string|max:255',
        ];
    }
}
