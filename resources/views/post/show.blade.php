@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex gap-6">
        <div class="md:w-1/2 sm:my-5 md:m-0">
            <img src="{{ asset('uploads' . '/' . $post->imagen) }}" alt="Imagen del post {{ $post->titulo }}">
            <div>
                <div class="mt-5 flex justify-between items-center">
                    <div class="flex gap-2">
                        @if ( $post->checkLike(auth()->user() ))
                            <form action="{{ route('posts.likes.destroy', $post) }}" class="flex gap-2" method="POST">
                                @method('DELETE')
                                @csrf
                                @auth
                                    <div>
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                            </svg>
                                        </button>
                                    </div>
                                @endauth
                            </form>
                        @else
                            <form action="{{ route('posts.likes.store', $post) }}" class="flex gap-2" method="POST">
                                @csrf
                                @auth
                                    <div>
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                            </svg>
                                        </button>
                                    </div>
                                @endauth
                            </form>
                        @endif
                        <p>
                            {{ $post->likes->count() }} Likes
                        </p>
                    </div>
                    <div>
                        @auth
                            @if ($post->user_id === auth()->user()->id)
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="cursor-pointer text-white bg-red-500 p-2 rounded-full font-bold text-sm hover:bg-red-600 hover:text-black">
                                </form>
                            @endif
                        @endauth
                    </div>
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