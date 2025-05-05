@extends('layouts.app')

@section('title', 'Editar usuário')
@section('header', 'Editar usuário')

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

    <form method="POST" action="{{ route('users.update', $user->id) }}" class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-4">
            <label for="registration_number" class="block text-sm font-medium text-gray-700">Número de cadastro</label>
            <input type="number" name="registration_number" id="registration_number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('registration_number', $user->registration_number) }}">
        </div>

        <div class="flex gap-2 items-center">
            <x-icon-button type="button" color="red" icon="trash-2" onclick="showModal('confirm-delete-modal')" tooltip="Deletar usuário"/>
            <x-icon-button type="submit" icon="save-all" color="green" tooltip="Salvar"/>
        </div>

    </form>

    <div id="confirm-delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="relative bg-white w-full max-w-md p-6 rounded-xl shadow-lg transition-all duration-300">
            <button onclick="hideModal('confirm-delete-modal')" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-xl">
                &times;
            </button>

            <h3 class="text-xl font-semibold text-gray-800 text-center">Tem certeza que quer deletar esse usuário?</h3>
            <p class="text-sm text-gray-600 text-center mt-2">Essa ação não pode ser desfeita.</p>

            <div class="mt-6 flex justify-center gap-4">
                <button onclick="document.getElementById('delete-user-form').submit()" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">
                    Sim, deletar
                </button>
                <button onclick="hideModal('confirm-delete-modal')" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    <form id="delete-user-form" action="{{ route('users.delete', $user->id) }}" method="POST" class="hidden">
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
