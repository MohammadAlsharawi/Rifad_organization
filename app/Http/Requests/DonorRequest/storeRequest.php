<?php

namespace App\Http\Requests\DonorRequest;

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
            'email'          => ['nullable', 'email', 'max:255'],
            'phone'          => ['nullable', 'string', 'max:255'],
            'donated_amount' => ['required', 'numeric', 'min:0'],
            'project_id'     => [
                'required',
                'exists:projects,id',
                function ($attribute, $value, $fail) {
                    if (! \App\Models\Project::where('id', $value)->where('status', 'in_progress')->exists()) {
                        $fail('The selected project must be in progress.');
                    }
                },
            ],
        ];
    }

}
