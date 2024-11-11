@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->name}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img class="rounded-full"
                src="{{ $user->imagen ?
                            asset('perfiles') . '/' . $user->imagen :
                            asset('img/usuario.svg') }}"
                     alt="Imagen del Usuario {{ $user->name }}">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex items-center flex-col md:items-start md:justify-center">
                <div class="flex gap-2">
                    <p class="text-gray-700 text-2xl">{{$user->username}}</p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="text-gray-800 text-sm my-1 font-bold">
                    0
                    <span>Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm my-1 font-bold">
                    0
                    <span>Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm my-1 font-bold">
                    {{ $user->posts->count() }}
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