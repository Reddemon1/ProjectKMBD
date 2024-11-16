<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateOrganizationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->role == 'admin';;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'structure' => 'nullable|mimes:jpeg,png,jpg,gif|max:3072',
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif|max:3072',
            'logo_desc' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'organization_desc' => 'required',
            'period' => 'required',
            'active_members' => 'required',
            'area' => 'required',
            'alumni_count' => 'required',
        ];
    }
}
