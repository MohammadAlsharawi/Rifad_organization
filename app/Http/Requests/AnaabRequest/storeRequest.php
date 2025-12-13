<?php

namespace App\Http\Requests\AnaabRequest;

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
            'name_en'      => 'required|string|max:255',
            'name_ar'      => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'email'        => 'required|email',
            'residence_id' => 'required|exists:residences,id',
        ];
    }
}
