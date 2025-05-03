@extends('layouts.app')

@section('title', 'Create book')
@section('header', 'Create book')

@section('content')
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
    <form method="POST" action="{{ route('books.store') }}" class=" w-full grid grid-cols-1 md:grid-cols-3 gap-4">

        @csrf

        <x-bladewind::input
            name="name"
            label="Name"
            required="true"
        />

        <x-bladewind::input
            name="author"
            label="Author"
            required="true"
        />

        <x-bladewind::input
            name="registration_number"
            label="Registration number"
            type="number"
            required="true"
        />
        <x-select-dropdown
            name="genre_id"
            :options="$genres"
            label="Select Genre"
        />
       <x-select-dropdown name="situation" :options="$situations" label="Book situation" />


        <div class="flex gap-2 items-center">
            <x-bladewind::button.circle icon="check" color="green" can_submit="true"></x-bladewind::button.circle>

        </div>
    </form>
@endsection
