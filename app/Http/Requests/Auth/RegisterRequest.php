<?php

namespace App\Http\Request\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8|max:20|alpha_num',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute is required.',
            'unique' => 'Email isi yang bener woe.',
            'min' => ':attribute minimal 8 kocak',
            'max' => ':attribute maksimal 20 kocak',
            'alpha_num' => 'Harus alphanumeric ini pass',
        ];
    }
}
