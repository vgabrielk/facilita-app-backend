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
        'name.required' => 'O nome do livro é obrigatório.',
        'author.required' => 'O autor do livro é obrigatório.',
        'registration_number.required' => 'O número de registro do livro é obrigatório.',
        'situation.required' => 'A situação do livro é obrigatória.',
        'genre_id.required' => 'O campo gênero é obrigatório.',
        'genre_id.exists' => 'O gênero selecionado não existe.',
        ];
    }
}
