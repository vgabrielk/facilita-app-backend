<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Facilita')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />


    <script defer src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script defer src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 font-sans min-h-screen antialiased">

    <header class="bg-white shadow p-4 px-12 mb-12" >
        <div class="mx-auto flex justify-between">
            <h1 class="text-xl font-bold">@yield('header', 'Facilita')</h1>
           <div class="flex items-center gap-4">
               <a href="{{route('users.view')}}" >Users</a>
               <a href="{{route('users.view')}}" >Genres</a>
               <a href="{{route('users.view')}}" >Books</a>
           </div>

        </div>
    </header>

    <main class=" mx-auto px-12">
        @yield('content')
    </main>
</body>
</html>
