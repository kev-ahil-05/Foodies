<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Foodies') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Vite Assets (Inayos mula sass/app.css patungong css/app.css) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-950 antialiased">
        <!-- Bootstrap: min-vh-100 d-flex flex-column justify-content-center align-items-center pt-4 bg-light -->
        <div class="min-h-screen flex flex-column sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <!-- Dito mo pwedeng ilagay ang iyong Logo o Text Image sa hinaharap -->
                    <span class="text-2xl font-black tracking-wider text-gray-900">FOODIES</span>
                </a>
            </div>

            <!-- Card Box Wrapper -->
            <!-- Bootstrap: w-100 mt-4 px-4 py-4 bg-white shadow-sm rounded na may custom inline max-width style -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
