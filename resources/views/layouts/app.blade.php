<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'FoundIn') }}</title>
    <link href="{{ asset('impact') }}/assets/img/favicon-fi.png" rel="icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main>
            {{ $slot ?? '' }}
            @yield('content')
        </main>
    </div>
</body>
</html>