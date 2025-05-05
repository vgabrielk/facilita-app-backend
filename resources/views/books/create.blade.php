@extends('layouts.app')

@section('title', 'Create book')
@section('header', 'Create book')

@section('content')
    @php
        $situations = collect([
            [ 'label' => \App\Enums\SituationEnum::Available->label(),  'value' => \App\Enums\SituationEnum::Available->value ],
            [ 'label' => \App\Enums\SituationEnum::Borrowed->label(),  'value' => \App\Enums\SituationEnum::Borrowed->value ],
        ]);
        $genres = \App\Models\Genre::all()->map(function ($genre) {
            return [
                'label' => \App\Enums\GenreEnum::tryFrom($genre->name)?->label() ?? $genre->name,
                'value' => $genre->id,
            ];
});
    @endphp
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-[40px]">
        <x-icon-button icon="arrow-left" color="blue" onclick="window.location.href='{{ route('books.view') }}'" tooltip="Voltar"/>
    </div>

    <form method="POST" action="{{ route('books.store') }}" class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name') }}">
        </div>

        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Autor</label>
            <input type="text" name="author" id="author" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('author') }}">
        </div>

        <div class="mb-4">
            <label for="registration_number" class="block text-sm font-medium text-gray-700">Número de registro</label>
            <input type="number" name="registration_number" id="registration_number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('registration_number') }}">
        </div>

        <div class="mb-4">
            <label for="genre_id" class="block text-sm font-medium text-gray-700">Selecione um gênero</label>
            <select name="genre_id" id="genre_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach($genres as $genre)
                    <option value="{{ $genre['value'] }}" @if(old('genre_id') == $genre['value']) selected @endif>{{ $genre['label'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="situation" class="block text-sm font-medium text-gray-700">Situação do livro</label>
            <select name="situation" id="situation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach($situations as $situation)
                    <option value="{{ $situation['value'] }}" @if(old('situation', \App\Enums\SituationEnum::Available->value) == $situation['value']) selected @endif>{{ $situation['label'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-2 items-center">
           <x-icon-button type="submit" icon="save-all" color="green" tooltip="Salvar"/>
        </div>

    </form>
@endsection
