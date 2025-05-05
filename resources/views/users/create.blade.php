@extends('layouts.app')

@section('title', 'Criar usuário')
@section('header', 'Criar usuário')

@section('content')
    <div class="mb-[40px]">
        <x-icon-button icon="arrow-left" onclick="window.location.href='{{ route('users.view') }}'" color="blue" tooltip="Voltar"/>
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

    <form method="POST" action="{{ route('users.store') }}" class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  value="{{ old('name') }}">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label for="registration_number" class="block text-sm font-medium text-gray-700">Número de cadastro</label>
            <input type="number" name="registration_number" id="registration_number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('registration_number') }}">
        </div>

        <div class="flex gap-2 items-center">
            <x-icon-button icon="save-all" tooltip="Salvar" type="submit" />
        </div>

    </form>
@endsection
