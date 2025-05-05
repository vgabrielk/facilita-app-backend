<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the v?alidation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => 'string|in:late,returned',
            'due_date' => 'date|date_format:Y-m-d',
            'user_id' => 'integer|exists:users,id',
            'book_id' => 'integer|exists:books,id',
        ];
    }
    public function messages(): array
    {
        return [
            'status.in' => 'O status deve ser "late" (atrasado) ou "returned" (devolvido).',
            'status.string' => 'O status deve ser uma string válida.',
            'due_date.date' => 'A data de vencimento deve ser uma data válida.',
            'due_date.date_format' => 'A data de vencimento deve estar no formato Y-m-d.',
            'user_id.integer' => 'O ID do usuário deve ser um número inteiro.',
            'user_id.exists' => 'O usuário selecionado não existe.',
            'book_id.integer' => 'O ID do livro deve ser um número inteiro.',
            'book_id.exists' => 'O livro selecionado não existe.',
        ];
    }
}
