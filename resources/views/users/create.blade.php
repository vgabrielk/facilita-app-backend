@extends('layouts.app')

@section('title', 'Create user')
@section('header', 'Create user')

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
    <form method="POST" action="{{ route('users.store') }}" class=" w-full grid grid-cols-1 md:grid-cols-3 gap-4">

        @csrf

        <x-bladewind::input
            name="name"
            label="Name"
            required="true"
        />

        <x-bladewind::input
            name="email"
            label="E-mail"
            type="email"
            required="true"
        />

        <x-bladewind::input
            name="registration_number"
            label="Registration number"
            type="number"
            required="true"
        />

        <div class="flex gap-2 items-center">
            <x-bladewind::button.circle icon="check" color="green" can_submit="true"></x-bladewind::button.circle>

        </div>
    </form>
@endsection
