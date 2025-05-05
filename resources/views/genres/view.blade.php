@extends('layouts.app')

@section('title', 'Books')

@section('header', 'Books')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <ul class="space-y-4">
            @foreach($genres as $genre)
                <li class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                    <div class="text-sm font-medium text-slate-900">
                        {{$genre->name}}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
