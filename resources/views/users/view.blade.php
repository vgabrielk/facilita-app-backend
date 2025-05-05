@extends('layouts.app')

@section('title', 'Usuários')

@section('header', 'Usuários')

@section('content')
    <div class="container mx-auto p-6">
        <x-session-success />
        <x-session-error />
        <div class="mb-6">
            <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Criar usuário
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <x-table
            :headers="['Número de cadastro', 'Nome', 'Email']"
            :rows="$users->map(function ($user) {
             return [
                 'id' => $user->id,
                 'cells' => [
                     $user->registration_number,
                     $user->name,
                     $user->email
                 ]
             ];
         })"
         :editRoute="'users.edit'"
            />

        </div>
    </div>
@endsection
