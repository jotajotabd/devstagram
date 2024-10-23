@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->name}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg')}}" alt="imagen-ususario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex items-center flex-col md:items-start md:justify-center">
                <p class="text-gray-700 text-2xl">{{$user->username}}</p>
                <p class="text-gray-800 text-sm my-1 font-bold">
                    0
                    <span>Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm my-1 font-bold">
                    0
                    <span>Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm my-1 font-bold">
                    0
                    <span>Posts</span>
                </p>
            </div>
        </div>

    </div>
@endsection