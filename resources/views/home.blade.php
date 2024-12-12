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