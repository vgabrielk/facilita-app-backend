@extends('layouts.app')

@section('title', 'Edit user')
@section('header', 'Edit user')

@section('content')
    <div class="mb-[40px]">
        <x-bladewind::button.circle icon="arrow-left" outline="true"  onclick="window.location.href='{{ route('users.view') }}'" class="text-blue-900"></x-bladewind::button.circle>
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

    <form method="POST" action="{{ route('users.update', $user->id) }}" class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
        @csrf
        @method('PUT')
        <x-bladewind::input
            name="name"
            label="Name"
            value="{{ old('name', $user->name) }}"
        />

        <x-bladewind::input
            name="email"
            label="E-mail"
            type="email"
            value="{{ old('email', $user->email) }}"
        />

        <x-bladewind::input
            name="registration_number"
            label="Registration number"
            type="number"
            value="{{ old('registration_number', $user->registration_number) }}"
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
        title="Are you sure you want to delete this user?"
        ok_button_action="document.getElementById('delete-user-form').submit()"
        ok_button_label="Yes, delete"
        cancel_button_label="don't delete">
>
    </x-bladewind::modal>
    <form id="delete-user-form" action="{{ route('users.delete', $user->id) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
@endsection
