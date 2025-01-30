<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Busca Curitiba - Gerenciador de Domínios</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
            </style>
        @endif
    </head>
    <body class="font-sans antialiased bg-[--primary-bg-color] text-black/50 flex flex-col items-center min-h-screen">
        <header class="w-full px-6 py-4 bg-white shadow-md">
            <div class="max-w-7xl mx-auto grid grid-cols-2 items-center gap-2 lg:grid-cols-3">
                <div class="flex lg:justify-center lg:col-start-2">
                    <img src="{{url('images/logo_busca.png')}}" alt="Logo Busca Curitiba"/>
                </div>
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-[#227059] ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-black/80 dark:focus-visible:ring-white">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-[#227059] ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-black/80 dark:focus-visible:ring-white">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-[#227059] ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-black/80 dark:focus-visible:ring-white">
                                    Registrar
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>
        <div class="w-full max-w-2xl px-6 lg:max-w-7xl bg-white p-6 rounded-lg shadow-md mt-10">
            <main class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                <div class="p-6">
                    <h2 class="text-green-600 text-xl font-bold">Teste de Habilidades</h2>
                    <p class="text-gray-500 mt-2">Olá Portal Busca Curitiba! Bem vindo ao meu desafio!  </p>
                    <p class="text-gray-500 mt-2">As tecnologias utilizadas foram:</p>
                    <p class="text-gray-500 mt-2">
                        - Framework Laravel 11; <br>
                        - Sail 2; <br>
                        - PHP 8.3; <br>
                        - Blade e Breeze; <br>
                        - TailwindCSS 3.1; <br>
                        - MySQL 8; <br>

                    </p>
                </div>
                <div class="p-6">
                    <h2 class="text-green-600 text-xl font-bold">Gerenciamento de Domínios</h2>
                    <p class="text-gray-500 mt-2">Esta aplicação possui as seguintes funcionalidades:</p>
                    <p class="text-gray-500 mt-2">
                        - CRUD de Usuários; <br>
                        - Painel de Gerenciamento de domínios; <br>

                    </p>
                </div>
            </main>
        </div>
        <footer class="py-16 text-center text-sm text-white">
            Thomaz Juliann Boncompagni - Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </body>
</html>
