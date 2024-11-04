@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex gap-6">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads' . '/' . $post->imagen) }}" alt="Imagen del post {{ $post->titulo }}">
            <div>
                <div class="p-3">
                    <p>
                        0 Likes
                    </p>
                </div>
                <div>
                    <p class="font-bold">
                        {{ $post->user->username }}
                    </p>
                    <p class="text-sm text-gray-600">
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                    <p class="mt-5">
                        {{ $post->descripcion }}
                    </p>
                </div>
            </div>
        </div>
        <div class="md:w-1/2">
            <div class="shadow bg-white p-5 mb-5">
                <p class="text-xl font-bold text-center mb-5">
                    Comentarios
                </p>
                @if ($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario )
                        <div class="text-end my-5 p-2 bg-slate-100 rounded-3xl">
                            <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold"> {{ $comentario->user->username }}</a>
                            <p class=""> {{ $comentario->comentario }}</p>
                            <p class=" text-sm text-gray-600">
                                {{ $comentario->created_at->diffForHumans() }}
                            </p>
                        </div>
                    @endforeach
                @else
                    <div class="p-20">
                        <p class="italic uppercase text-center">
                            Sin Comentarios Aún
                        </p>
                    </div>
                @endif
                @auth
                <form action=" {{ route('comentario.store',['post'=> $post, 'user'=>$user ]) }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Agrega un comentario</label>
                        <textarea
                            id="comentario"
                            name="comentario"
                            placeholder="Agrega un comentario"
                            class="border p-3 w-full rounded-lg
                            @error('comentario')
                            border-red-500
                            @enderror"
                        >
                        </textarea>
                        @error('comentario')
                            <p class="my-2 text-sm italic text-red-600">{{$message}}</p>
                        @enderror
                    </div>

                    @session('mensaje')
                        <p class="my-2 text-sm italic text-green-600 text-center">
                            {{ session('mensaje') }}
                        </p>
                    @endsession

                    <input type="submit"
                           value="Publicar comentario"
                           class="bg-sky-600 hover:bg-sky-700 text-white cursor-pointer uppercase w-full p-3 font-bold rounded-lg transition-colors"
                    >
                </form>
                @endauth
            </div>
        </div>
    </div>
@endsection