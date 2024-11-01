<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('style')
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <title>@yield('titulo')</title>
    </head>
    <body class="bg-gray-100 grid h-dvh grid-rows-[auto_1fr_auto]">
        <header class="p-5 border-b bg-white shadow">
                <div class="container mx-auto flex justify-between items-center gap-8">
                    <a href="/">
                        <h1 class="text-3xl font-black bold">
                            DevStagram
                        </h1>
                    </a>

                    @auth
                        <p class="font-bold uppercase text-green-400 text-sm italic text-center">
                            Usuario Autenticado {{--{{auth()->user()->username}}--}}
                        </p>
                        <nav class="flex gap-2">
                            <a class="font-bold text-gray-600 uppercase text-sm  flex items-center cursor-pointer gap-1" href="{{ route('posts.index', auth()->user()->username) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                Home
                            </a>
                            <a class="font-bold text-gray-600 uppercase text-sm  flex items-center cursor-pointer gap-1" href="{{ route('posts.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Crear
                            </a>
                            <form method="POST" action=" {{ route('logout') }}">
                                @csrf
                                <button type="submit" class="font-bold uppercase text-gray-600 text-sm pb-1">Cerrar Sesión</button>
                            </form>
                            <a class="font-bold uppercase flex items-center text-gray-600 text-sm" href="/ayuda">Ayuda</a>
                        </nav>
                    @endauth

                    @guest
                        <nav class="flex gap-2 item">
                            <a class="font-bold uppercase text-gray-600 text-sm" href=" {{ route('login') }}">
                                Login
                            </a>
                            <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">
                                Crear Cuenta
                            </a>
                        </nav>
                    @endguest
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