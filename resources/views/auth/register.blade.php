@extends('layouts.app')

@section('titulo')
    Regístrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex justify-center md:gap-10 md:items-center">

        <div class="md:w-6/12 p-6">
            <img src="{{asset ('img/registrar.jpg')}}" alt="Imagen registro de usuario ">
        </div>

        <div class="md:w-6/12 bg-white shadow-xl p-6 rounded-lg">
            <form action"{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input
                        id="name"
                        name="name"
                        placeholder="Tu Nombre"
                        class="border p-3 w-full rounded-lg
                        @error('name')
                        border-red-500
                        @enderror"
                        value={{old ('name')}}
                    >
                    @error('name')
                        <p class="my-2 text-sm italic text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" form="username" class="mb-2 block uppercase text-gray-500 font-bold">Usuario</label>
                    <input
                        id="username"
                        type="text"
                        name="username"
                        placeholder="Nombre de usuario"
                        class="border p-3 w-full rounded-lg
                        @error('username')
                         border-red-500
                        @enderror"
                        value={{old ('username')}}
                    >
                    @error('username')
                        <p class="my-2 text-sm italic text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        placeholder="Correo Electrónico"
                        class="border p-3 w-full rounded-lg
                        @error('email')
                        border-red-500
                        @enderror"
                        value={{old ('email')}}
                    >
                    @error('email')
                        <p class="my-2 text-sm italic text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Tu contraseña"
                        class="border p-3 w-full rounded-lg
                        @error('password')
                        border-red-500
                        @enderror"
                    >
                    @error('password')
                        <p class="my-2 text-sm italic text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Password</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="Repetir tu contraseña"
                        class="border p-3 w-full rounded-lg
                        @error('password_confirmation')
                        border-red-500
                        @enderror"
                    >
                    @error('password_confirmation')
                        <p class="my-2 text-sm italic text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 text-white cursor-pointer uppercase w-full p-3 font-bold rounded-lg transition-colors">
            </form>
        </div>
    </div>
@endsection