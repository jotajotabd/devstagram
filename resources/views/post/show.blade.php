@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto flex gap-6">
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
            <div>
            </div>
        </div>
    </div>
@endsection