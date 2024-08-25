<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>@yield('titulo')</title>
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
                <div class="container mx-auto flex justify-between items-center">
                    <a href="/">
                        <h1 class="text-3xl font-black bold">
                            DevStagram
                        </h1>
                    </a>
                    <nav class="flex gap-2 item">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="">Login</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="/register">Crear Cuenta</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="/ayuda">Ayuda</a>
                    </nav>
                </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="mt-20 text-center p-5 text-white font-bold bg-gray-700">
            DEVSTAGRAM - TODOS LOS DERECHOS RESERVADOS
        {{now()-> year}}
        </footer>


    </body>
</html>