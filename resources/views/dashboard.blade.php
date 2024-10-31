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
    <section class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10 my-10">
            Publicaciones
        </h2>
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 items-center">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show',['post' => $post, 'user' => $user]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-10">
                {{ $posts->links() }}
            </div>
        @else
            <p class="uppercase text-lg font-bold text-center text-gray-600">
                Sin Publicaciones
            </p>
        @endif
    </section>
@endsection