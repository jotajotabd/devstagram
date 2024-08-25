@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex justify-center md:gap-10 md:items-center">

        <div class="md:w-6/12 p-5">
            <img src="{{asset ('img/registrar.jpg')}}" alt="Imagen registro de usuario ">
        </div>

        <div class="md:w-4/12 bg-white shadow-xl p-6 rounded-lg">
            <form action"">
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input id="name" name="name" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="username" form="username" class="mb-2 block uppercase text-gray-500 font-bold">Usuario</label>
                    <input id="username" type="text" name="username" placeholder="Nombre de usuario" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input id="email" type="email" name="email" placeholder="Correo Electrónico" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input id="password" type="password" name="password" placeholder="Tu contraseña" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir assword</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Repetir tu contraseña" class="border p-3 w-full rounded-lg">
                </div>
                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 text-white cursor-pointer uppercase w-full p-3 font-bold rounded-lg transition-colors">
            </form>
        </div>
    </div>
@endsection