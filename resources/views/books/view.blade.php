@extends('layouts.app')

@section('title', 'Books')

@section('header', 'Books')

@section('content')
    @if (session('success'))
        <x-bladewind::alert type="success" class="mb-4">
            {{ session('success') }}
        </x-bladewind::alert>
    @endif

    @if (session('error'))
        <x-bladewind::alert type="error" class="mb-4">
            {{ session('error') }}
        </x-bladewind::alert>
    @endif
    <x-bladewind::button onclick="window.location.href='{{ route('books.create') }}'" class="mb-4" >Create book</x-bladewind::button>
    <x-bladewind::table striped="true"
                        divider="thin"
                        has_border="true"
    >
        <x-slot name="header">
            <th>Registration Number</th>
            <th>Name</th>
            <th>Author</th>
            <th>Situation</th>
            <th>Actions</th>
        </x-slot>
        @foreach($books as $book)
            <tr>
                <td>{{$book->registration_number}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->author}}</td>
                <td class="uppercase">{{$book->situation}}</td>
                <td class="flex gap-2">
                    <x-bladewind::button.circle icon="pencil" outline="true" class="p-2 rounded" onclick="window.location.href='{{ route('books.edit', $book->id) }}'">
                    </x-bladewind::button.circle>
                </td>
            </tr>
        @endforeach
    </x-bladewind::table>
@endsection
