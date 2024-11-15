<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateArticleRequest extends FormRequest
{
    public function authorize(): bool
    {

        return Auth::check() && Auth::user()->role == 'admin';
    }
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'content' => 'required',
            'date' => 'required|date',
            'writer' => 'required',
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
