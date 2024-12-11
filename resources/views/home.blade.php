@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    @if ($posts->count())
        <div class="grid items-center grid-cols-1 gap-5 mx-auto sm:p-0 xl:px-96">
            @foreach ($posts as $post)
                <div class="mb-5">
                    <a href="{{ route('posts.show',['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                    </a>
                        @auth
                            <livewire:like-post :post="$post"/>

                            {{-- @if ( $post->checkLike(auth()->user() ))
                                <form action="{{ route('posts.likes.destroy', $post) }}" class="mt-2 flex gap-2" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <div>
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                            </svg>
                                        </button>
                                    </div>
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
                            @endif --}}
                        @endauth
                    <p class="font-bold">
                        {{ $post->user->username }}
                    </p>
                    <p>
                        {{ $post->titulo }}
                    </p>
                    <p>
                        {{ $post->descripcion }}
                    </p>
                    <p class="text-sm text-gray-600 mt-2">
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>
            @endforeach
        </div>
    @else
    @endif
@endsection