@extends('layouts.app')

@section('titulo')
    Edición del perfil de: {{ auth()->user()->name }}
@endsection

@section('contenido')
    <div class="md: flex md:justify-center ">
        <div class="w-full md:w-1/2 bg-white shadow p-6">
            <form action=" {{  route('perfil.store')  }}" method="POST" class="mt-10 md:mt-0" enctype="multipart/form-data">
                @csrf
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
                        value={{ auth()->user()->username }}
                    >
                    @error('username')
                        <p class="my-2 text-sm italic text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" form="username" class="mb-2 block uppercase text-gray-500 font-bold">Imagen de Perfil</label>
                    <input
                        id="imagen"
                        type="file"
                        name="imagen"
                        class="border p-3 w-full rounded-lg"
                        accept=".jpe, .jpeg, .png"
                    >
                </div>
                <input type="submit" value="Guardar Cambios" class="bg-green-600 hover:bg-green-700 text-white cursor-pointer uppercase w-full p-3 font-bold rounded-lg transition-colors">
            </form>
        </div>
    </div>
@endsection