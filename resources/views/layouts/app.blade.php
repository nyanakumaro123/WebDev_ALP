<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HoopsCloth') }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Scripts -->
    <style>
        .pagination .page-link:hover {
            color: #000000;
            background-color: #f8f9fa;
            border-color: #adb5bd;
        }

        .pagination .page-item.active .page-link {
            background-color: #000000;
            color: #ffffff;
            border-color: #000000;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #ffffff;
            border-color: #dee2e6;
        }
    </style>


</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        {{-- <x-navigation /> --}}

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
