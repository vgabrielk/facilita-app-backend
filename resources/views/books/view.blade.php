@extends('layouts.app')

@section('title', 'Books')

@section('header', 'Books')

@section('content')
    <div class="container mx-auto p-6">
        <x-session-success />
        <x-session-error />
        <div class="mb-6">
            <a href="{{ route('books.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Criar livro
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-6">
            <div class="mb-6 flex items-center justify-between flex-wrap gap-4">
                <h2 class="text-xl font-semibold text-gray-800">Filtrar por Gênero</h2>
                <form method="GET" action="{{ route('books.view') }}">
                    <div class="flex items-center gap-2">
                        <select name="genre" onchange="this.form.submit()" class="block w-full md:w-64 bg-white border border-gray-300 text-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Todos os gêneros</option>
                            @foreach(\App\Models\Genre::all() as $genre)
                                <option value="{{ $genre->id }}" @if(request('genre') == $genre->id) selected @endif>
                                    {{ \App\Enums\GenreEnum::tryFrom($genre->name)?->label() ?? $genre->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

            <x-table
                :headers="['Número de registro', 'Nome', 'Autor', 'Situação', 'Gênero']"
                :rows="$books->map(function ($book) {
            return [
                'id' => $book->id,
                'cells' => [
                    $book->registration_number,
                    $book->name,
                    $book->author,
                    \App\Enums\SituationEnum::from($book->situation)->label(),
                    \App\Enums\GenreEnum::from($book->genre->name)->label()
                ]
            ];
        })"
                :editRoute="'books.edit'"
            />
        </div>
    </div>
@endsection
