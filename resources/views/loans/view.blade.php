@extends('layouts.app')

@section('title', 'Users')

@section('header', 'Users')

@section('content')
    <div class="container mx-auto p-6">
        <x-session-success />
        <x-session-error />
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <x-table
                :headers="['Data de devolução', 'Status', 'Usuário', 'Livro']"
                :rows="$loans->map(function ($loan) {
             return [
                 'id' => $loan->id,
                 'cells' => [
                     $loan->due_date,
                    \App\Enums\LoanStatusEnum::tryFrom($loan->status)?->label() ?? 'Emprestado',
                     $loan->user->name,
                     $loan->book->name
                 ]
             ];
         })"
                :editRoute="'loans.edit'"
            />

        </div>
    </div>
@endsection
