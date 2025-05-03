@extends('layouts.app')

@section('title', 'Edit book')
@section('header', 'Edit book')

@section('content')
    <div class="mb-[40px]">
        <x-bladewind::button.circle icon="arrow-left" outline="true"  onclick="window.location.href='{{ route('books.view') }}'" class="text-blue-900"></x-bladewind::button.circle>
    </div>
    @if ($errors->any())
        <x-bladewind::alert type="error" class="mb-4">
            <div class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </x-bladewind::alert>
    @endif
    @php
        $situations = collect([
            [ 'label' => 'Borrowed',  'value' => 'borrowed' ],
            [ 'label' => 'Available', 'value' => 'available' ]
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
        <x-bladewind::input
            name="name"
            label="Name"
            required="true"
            value="{{ old('name', $book->name) }}"
        />

        <x-bladewind::input
            name="author"
            label="Author"
            required="true"
            value="{{ old('author', $book->author) }}"
        />

        <x-bladewind::input
            name="registration_number"
            label="Registration number"
            type="number"
            required="true"
            value="{{ old('registration_number', $book->registration_number) }}"
        />

        <x-select-dropdown
            name="genre_id"
            :options="$genres"
            label="Select Genre"
            :selected="old('genre_id', $book->genre_id)"

        />

        <x-select-dropdown
            name="situation"
            :options="$situations"
            label="Book situation"
            :selected="old('situation', $book->situation)"
        />

        <div class="flex gap-2 items-center">
            <x-bladewind::button.circle
                icon="trash"
                color="red"
                outline="true"
                onclick="showModal('confirm-delete-modal')"
            />
        <x-bladewind::button.circle  icon="check" color="green" can_submit="true"></x-bladewind::button.circle>

        </div>

    </form>
    <x-bladewind::modal
        stretched_action_buttons="true"
        type="warning"
        name="confirm-delete-modal"
        title="Are you sure you want to delete this book?"
        ok_button_action="document.getElementById('delete-book-form').submit()"
        ok_button_label="Yes, delete"
        cancel_button_label="don't delete">
>
    </x-bladewind::modal>
    <form id="delete-book-form" action="{{ route('books.delete', $book->id) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
@endsection
