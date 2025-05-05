@extends('layouts.app')

@section('title', 'Edit book')
@section('header', 'Edit book')

@section('content')
    <div class="mb-[40px]">
        <x-icon-button icon="arrow-left" color="blue" onclick="window.location.href='{{ route('books.view') }}'" tooltip="Voltar"/>
    </div>
    <x-session-success />
    <x-session-error />
    @php
        $situations = collect([
             [ 'label' => \App\Enums\SituationEnum::Available->label(),  'value' => \App\Enums\SituationEnum::Available->value ],
             [ 'label' => \App\Enums\SituationEnum::Borrowed->label(),  'value' => \App\Enums\SituationEnum::Borrowed->value ],
         ]);
         $genres = \App\Models\Genre::all()->map(function($genre) {
             return [
                 'label' => $genre->name,
                 'value' => $genre->id,
             ];
         });
    @endphp

    <form method="POST" action="{{ route('books.update', $book->id) }}" class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required value="{{ old('name', $book->name) }}">
        </div>

        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Autor</label>
            <input type="text" name="author" id="author" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required value="{{ old('author', $book->author) }}">
        </div>

        <div class="mb-4">
            <label for="registration_number" class="block text-sm font-medium text-gray-700">Número de registro</label>
            <input type="number" name="registration_number" id="registration_number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required value="{{ old('registration_number', $book->registration_number) }}">
        </div>

        <div class="mb-4">
            <label for="genre_id" class="block text-sm font-medium text-gray-700">Selecione o gênero</label>
            <select name="genre_id" id="genre_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach($genres as $genre)
                    <option value="{{ $genre['value'] }}" @if(old('genre_id', $book->genre_id) == $genre['value']) selected @endif>{{ $genre['label'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="situation" class="block text-sm font-medium text-gray-700">Situação do livro</label>
            <select name="situation" id="situation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach($situations as $situation)
                    <option value="{{ $situation['value'] }}" @if(old('situation', $book->situation) == $situation['value']) selected @endif>{{ $situation['label'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-2 items-center">
            <x-icon-button type="button" color="red" icon="trash-2" onclick="showModal('confirm-delete-modal')" tooltip="Deletar livro"/>
            <x-icon-button type="submit" color="green" icon="save-all" tooltip="Salvar"/>
            <x-icon-button :disabled="$book->situation !== \App\Enums\SituationEnum::Available->value" type="button" color="orange" icon="hand" onclick="window.location.href='{{ route('loans.loan', ['book' => $book->id]) }}'" tooltip="Emprestar livro" />
        </div>

    </form>

    <div id="confirm-delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="relative bg-white w-full max-w-md p-6 rounded-xl shadow-lg transition-all duration-300">
            <button onclick="hideModal('confirm-delete-modal')" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-xl">
                &times;
            </button>

            <h3 class="text-xl font-semibold text-gray-800 text-center">Tem certeza que quer deletar esse livro?</h3>
            <p class="text-sm text-gray-600 text-center mt-2">Essa ação não pode ser desfeita.</p>

            <div class="mt-6 flex justify-center gap-4">
                <button onclick="document.getElementById('delete-book-form').submit()" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">
                    Sim, deletar
                </button>
                <button onclick="hideModal('confirm-delete-modal')" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    <form id="delete-book-form" action="{{ route('books.delete', $book->id) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function showModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('hidden');
            }
        }

        function hideModal(id){
            const modal = document.getElementById(id)
            if(modal){
                modal.classList.add('hidden');
            }
        }
    </script>
@endsection
