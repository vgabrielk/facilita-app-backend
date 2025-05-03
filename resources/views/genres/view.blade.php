@extends('layouts.app')

@section('title', 'Books')

@section('header', 'Books')

@section('content')
    <x-bladewind::card>
        <x-bladewind::listview>
            @foreach($genres as $genre)
            <x-bladewind::listview.item>
                <div>
                    <div class="text-sm font-medium text-slate-900">
                        {{$genre->name}}
                    </div>
                </div>
            </x-bladewind::listview.item>
            @endforeach
        </x-bladewind::listview>
    </x-bladewind::card>
@endsection
