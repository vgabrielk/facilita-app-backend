<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name' => 'required',
            'author' => 'required',
            'registration_number' => 'required',
            'situation' => 'required',
            'genre_id' => 'required|exists:genres,id',
        ];
    }

    public function messages(): array
    {
        return [
            'genre_id.required' => 'The genre field is required.',
        ];
    }
}
