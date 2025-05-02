@extends('layouts.app')

@section('title', 'Usuários')

@section('header', 'Usuários')

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
    <x-bladewind::button onclick="window.location.href='{{ route('users.create') }}'" class="mb-4" >Create user</x-bladewind::button>
        <x-bladewind::table striped="true"
                            divider="thin"
                            has_border="true"
        >
            <x-slot name="header">
                <th>Registration Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </x-slot>
    @foreach($users as $user)
            <tr>
                <td>{{$user->registration_number}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td class="flex gap-2">
                    <x-bladewind::button.circle icon="pencil" outline="true" class="p-2 rounded" onclick="window.location.href='{{ route('users.edit', $user->id) }}'">
                    </x-bladewind::button.circle>
                </td>
            </tr>
    @endforeach
        </x-bladewind::table>
@endsection
