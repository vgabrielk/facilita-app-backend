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

        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
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
