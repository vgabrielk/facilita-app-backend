@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Gráfico de Barras')

@section('content')
    <div class="max-w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                                <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                                <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{ $loanCount }}</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Empréstimos realizados</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                                <path d="M3 2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3Zm1 2h12v12H4V4Z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{ $bookCount }}</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Livros registrados</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                                <path d="M14 3a3 3 0 1 0-6 0 3 3 0 0 0 6 0ZM10 5a1 1 0 1 1 0 2 1 1 0 0 1 0-2Zm0 4a4 4 0 0 0-4 4v4h8v-4a4 4 0 0 0-4-4Zm2 7H8v-3a2 2 0 0 1 4 0v3Z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{ $userCount }}</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Usuários registrados</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="column-chart"></div>
    </div>
@endsection
