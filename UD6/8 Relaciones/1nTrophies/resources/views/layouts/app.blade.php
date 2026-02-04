<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Users & Trophies')</title>
    
    {{-- ⚔️ Warrior Theme CSS ⚔️ --}}
    <link rel="stylesheet" href="{{ asset('css/warrior.css') }}">

    @stack('styles')
</head>
<body>
    {{-- Barra superior simple --}}
    <nav class="container-fluid">
        <ul>
            <li><strong><a href="{{ url('/') }}">🏆 Laravel Trophies</a></strong></li>
        </ul>
        <ul>
            <li><a href="{{ url('/users') }}">Users</a></li>
        </ul>
    </nav>

    <main class="container">
        {{-- Mensajes flash y errores, sin clases personalizadas --}}
        @if (session('status'))
            <p><mark>{{ session('status') }}</mark></p>
        @endif

        @if ($errors->any())
            <details open>
                <summary>Errores</summary>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </details>
        @endif

        @yield('content')
    </main>

    <footer class="container">
        <small>© {{ date('Y') }}</small>
    </footer>

    @stack('scripts')
</body>
</html>