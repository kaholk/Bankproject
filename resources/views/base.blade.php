<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Super Bank Polska</title>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Super Bank Polska</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @if( session()->has('user') )
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/dashboard') }}">Twoje konto</a>
                        </li>
                        @if(session()->get('user')->credential_level == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/new_transaction') }}">Nowy przelew</a>
                        </li>
                        @endif
                    @endif
                </ul>

                <ul class="navbar-nav ms-auto">
                    @if( session()->has('user') )
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/logout') }}"> Wyloguj</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/login') }}"> Logowanie</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}"> Rejestracja</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
