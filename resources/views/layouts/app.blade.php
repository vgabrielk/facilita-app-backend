<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Facilita')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 font-sans min-h-screen antialiased">

<div x-data="{ open: false }" class="flex h-screen">

    <div :class="{'translate-x-0': open, '-translate-x-full': !open}" class="lg:hidden fixed inset-0 z-50 transition-transform duration-300 bg-gray-800 bg-opacity-75">
        <div class="flex justify-end p-4">
            <button @click="open = false" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col items-center space-y-4 text-white">
            <a href="{{ route('users.view') }}" class="hover:text-gray-300">Usuários</a>
            <a href="{{ route('loans.index') }}" class="hover:text-gray-300">Empréstimos</a>
            <a href="{{ route('books.view') }}" class="hover:text-gray-300">Livros</a>
        </div>
    </div>

    <div class="flex-1 overflow-y-auto">

        <header class="bg-white py-6 px-12 shadow-sm mb-12 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Facilita</h2>
                </div>
            </div>

            <div class="hidden flex items-center" id="button-menu">
                <button @click="open = !open" class="text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <div class="lg:flex items-center gap-6 text-blue-500" id="navigation-menu">
                <nav class="flex flex-wrap items-center gap-4 text-sm font-medium text-gray-600">
                    <a href="{{ route('users.view') }}" class="hover:text-gray-900 transition">Usuários</a>
                    <a href="{{ route('loans.index') }}" class="hover:text-gray-900 transition">Empréstimos</a>
                    <a href="{{ route('books.view') }}" class="hover:text-gray-900 transition">Livros</a>
                </nav>
            </div>
        </header>

        <div x-show="open" class="hidden">
            <nav class="space-y-4 px-6 py-4 text-white">
                <a href="{{ route('users.view') }}" class="block hover:text-gray-300">Usuários</a>
                <a href="{{ route('loans.index') }}" class="block hover:text-gray-300">Empréstimos</a>
                <a href="{{ route('books.view') }}" class="block hover:text-gray-300">Livros</a>
            </nav>
        </div>

        <main class="mx-auto px-12">
            @yield('content')
        </main>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
<style>
@media(max-width: 768px){
    #button-menu{
        display: initial;
    }
    #navigation-menu{
        display: none;
    }
}
</style>

</body>
</html>
