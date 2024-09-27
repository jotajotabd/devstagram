@extends('layouts.app')

@section('titulo')
    Tu Cuenta
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.png')}}" alt="imagen-ususario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <p class="text-graay-700 text-2xl">{{$user->username}}</p>
            </div>
        </div>

    </div>
@endsection