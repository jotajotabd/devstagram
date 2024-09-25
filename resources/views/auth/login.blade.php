@extends('layouts.app')

@section('titulo')
    Inicia Sesión en DevStagram
@endsection

@section('contenido')
    <div class="md:flex justify-center md:gap-10 md:items-center">

        <div class="md:w-5/12 p-6">
            <img src="{{asset ('img/login.jpg')}}" alt="Imagen registro de usuario ">
        </div>

        <div class="md:w-5/12 bg-white shadow-xl p-6 rounded-lg">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf 
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
                @session('mensaje')
                    <p class="my-2 text-sm italic text-red-600 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endsession
                <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 text-white cursor-pointer uppercase w-full p-3 font-bold rounded-lg transition-colors">
            </form>
        </div>
    </div>
@endsection