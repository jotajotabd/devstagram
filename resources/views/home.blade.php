@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    @if ($posts->count())
        <div class="max-w-2xl fle-col justify-center items-center">
            @foreach ($posts as $post)
                <div class="flex gap-2">
                    <a href="{{ route('posts.show',['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                    </a>
                    <p>
                        {{ $post->titulo }}
                    </p>
                    <p>
                        {{ $post->descripcion }}
                    </p>
                </div>
            @endforeach
        </div>
    @else
    @endif
@endsection