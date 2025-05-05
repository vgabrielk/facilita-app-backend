@extends('layouts.app')

@section('title', 'Loan book')

@section('header', 'Loan book')

@section('content')
    @php
        $users = \App\Models\User::all()->map(function($user) {
            return [
                'label' => $user->name,
                'value' => $user->id,
            ];
        });
    @endphp
    <x-session-success />
    <x-session-error />
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6 mt-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700">
            <div>
                <h1 class="font-semibold text-3xl">{{ $book->name }}</h1>
                <div class="mt-2">
                    <span class="font-semibold">Autor: {{ $book->author }}</span>
                </div>
                <div class="mt-2">
                    <span class="font-semibold">Número de cadastro: {{ $book->registration_number }}</span>
                </div>
                <div class="mt-2">
                    <span class="{{ $book->situation === \App\Enums\SituationEnum::Available->value ? 'text-green-600 uppercase font-bold' : 'text-red-600 uppercase font-bold' }}">
                        {{ \App\Enums\SituationEnum::from($book->situation)->label() }}
                    </span>
                </div>
            </div>

            <div>
                <form method="POST" action="{{ route('loans.store')}}">
                    @csrf
                    <div class="mb-4">
                    <label for="situation" class="block text-sm font-medium text-gray-700">Selecione um usuário</label>

                    <select  name="user_id" id="user_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach($users as $user)
                            <option value="{{ $user['value'] }}" >{{ $user['label'] }}</option>
                        @endforeach
                    </select>
                    </div>


                    <div class="mb-4">
                        <label for="due_date" class="block text-sm font-medium text-gray-700">Data de devolução</label>
                        <input type="date" name="due_date" id="due_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('due_date') }}" required min="1">
                    </div>
                    <div class="mb-4 hidden">
                        <label for="book_id" class="block text-sm font-medium text-gray-700">Book</label>

                        <input type="text" name="book_id" id="book_id" value="{{$book->id}}"  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required min="1">
                    </div>

                    <div class="flex gap-2 items-center">
                        <x-icon-button icon="arrow-left" onclick="window.location.href='{{ route('books.edit', $book->id) }}'"  color="blue" tooltip="Voltar"/>
                        <x-icon-button type="submit" icon="save-all" color="green" :disabled="$book->situation !== \App\Enums\SituationEnum::Available->value" tooltip="Emprestar esse livro"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
