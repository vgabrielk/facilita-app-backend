@extends('layouts.app')

@section('title', 'Edit user')
@section('header', 'Edit user')

@section('content')
    <div class="mb-[40px]">
        <x-icon-button icon="arrow-left" onclick="window.location.href='{{ route('loans.index') }}'" color="blue" tooltip="Voltar"/>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('loans.update', $loan->id) }}" class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Usuário</label>
            <input type="text" id="name" disabled
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-700 sm:text-sm"
                   value="{{ $loan->user->name }}">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input disabled type="email" id="email"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-700 sm:text-sm"
                   value="{{ $loan->user->email }}">
        </div>

        <div class="mb-4">
            <label for="book" class="block text-sm font-medium text-gray-700">Livro</label>
            <input disabled type="text" id="book"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-700 sm:text-sm"
                   value="{{ $loan->book->name }}">
        </div>

        <div class="mb-4">
            <label for="due_date" class="block text-sm font-medium text-gray-700">Data de devolução</label>
            <input disabled type="date" name="due_date" id="due_date"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                   value="{{ old('due_date', $loan->due_date) }}">
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Selecione</option>
                <option value="late" {{ old('status', $loan->status) === 'late' ? 'selected' : '' }}>Atrasado</option>
                <option value="returned" {{ old('status', $loan->status) === 'returned' ? 'selected' : '' }}>Devolvido</option>
            </select>
        </div>

        <div class="flex items-end mb-4">
            <x-icon-button type="submit" color="green" icon="save" tooltip="Salvar alterações"/>
        </div>
    </form>

    <script>

    </script>
@endsection
