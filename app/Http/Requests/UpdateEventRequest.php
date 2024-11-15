<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'aktivis');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'description' => 'required',
            'date' => 'required|date',
            'registration_link' => 'required',
            'user_id' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Isi :attribute kocak',
            'image.max' => 'Foto maksimal 1mb woe',
            'date' => 'Format tanggal woi'
        ];
    }
}
