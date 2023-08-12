<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4',
            'password' => 'required|min:4'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Le pseudo ne peut pas être vide',
            'name.min' => 'Le pseudo doit faire minimum 4 caractères',
            'password.required' => 'Le mot de passe ne peut pas être vide',
            'password.min' => 'Le mot de passe doit faire minimum 4 caractères',
        ];
    }
}
