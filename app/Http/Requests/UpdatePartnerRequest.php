<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePartnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->role == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:1024',
            'benefit' => 'required',
            'category' => 'required|in:Card,Sponsor,MediaPartner',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Isi :attribute kocak',
            'image.max' => 'Foto maksimal 1mb woe',
            'category.in' => 'Please select either Card, Sponsor, or MediaPartner'
        ];
    }
}
