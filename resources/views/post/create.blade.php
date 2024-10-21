@extends('layouts.app')

@section('titulo')
    Creando nuevo Post
@endsection

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center md:gap-5">
        <div class="md:w-1/2 p-6 border-2">
            <form   action=" {{ route('imagenes.store') }} "
                    id="dropzone"
                    enctype="multipart/form-data"
                    method="POST"
                    class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                    @csrf
            </form>
        </div>
        <div class="md:w-1/2 bg-white shadow-xl p-6 rounded-lg mt-10 md:mt-0">
            <form action=" {{ route('posts.store') }} " method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input
                        id="titulo"
                        type="text"
                        name="titulo"
                        placeholder="Titulo de la Publicación"
                        class="border p-3 w-full rounded-lg
                        @error('titulo')
                        border-red-500
                        @enderror"
                        value={{old ('titulo')}}
                    >
                    @error('titulo')
                        <p class="my-2 text-sm italic text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea
                        id="descripcion"
                        type="descripcion"
                        name="descripcion"
                        placeholder="Descripcion de la Publicación"
                        class="border p-3 w-full rounded-lg
                        @error('descripcion')
                        border-red-500
                        @enderror"
                    >
                    {{old ('descripcion')}}
                    </textarea>
                    @error('descripcion')
                        <p class="my-2 text-sm italic text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <input type="submit" value="Crear Publicación" class="bg-sky-600 hover:bg-sky-700 text-white cursor-pointer uppercase w-full p-3 font-bold rounded-lg transition-colors">
            </form>
    </div>

@endsection