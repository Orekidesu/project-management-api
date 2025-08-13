<?php

namespace App\Http\Requests\Api\V1\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'first_name' => [
                'sometimes',
                'required',
                'string',
                'max:50',
            ],
            'last_name' => [
                'sometimes',
                'required',
                'string',
                'max:50',
            ],
            'email' => [
                'sometimes',
                'required',
                'email',
                // Rule::unique('clients', 'email')->ignore(request()->route('client')),
                Rule::unique('clients', 'email')->ignore($this->route('client')),
            ],
            'phone_no' => [
                'nullable',
                'string',
                'max:20',
            ],
            'company' => [
                'nullable',
                'string',
                'max:255',
            ],
            'notes' => [
                'nullable',
                'string',
            ]
        ];
    }
}
