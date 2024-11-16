<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProductionRequest extends FormRequest
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
            'title' => 'required|max:200',
            'description' => 'required|',
            'embeded_link' => ['required', 'url', function ($attribute, $value, $fail) {
                if (!preg_match('/^(https:\/\/)(www\.)?(youtube\.com\/|youtu\.be\/)/', $value)) {
                    return $fail('The :attribute must be a valid YouTube URL starting with HTTPS.');
                }
            }],
            'category' => 'required|in:Video,Podcast',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Isi :attribute kocak',
        ];
    }
}
