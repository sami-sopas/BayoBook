@extends('layouts.app')

@section('titulo')
    <!-- Aqui esta la variable que le pasamos desde el controlador -->
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="Imagen-post {{$post->titulo}}">

            <div class="p-3">
                <p>0 likes</p>
            </div>

            <div>  <!-- Podemos llamar a post->user gracias a la relacion N a 1 que definimos -->
                <p class="font-bold"> {{$post->user->username}}</p>
                <p class="text-sm text-gray-500">
                    <!-- diff for humans muestra hace cuanto se hizo la publicacion con la liberia carbon -->
                    {{ $post->created_at->diffForHumans()}}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>
        </div>
        <div class="md:w-1/2">
            <div class="shadow bg-white p-5 mb-5 ml-5">
                @auth
                <p class="text-xl font-bold text-center mb-4">
                    Agrega un nuevo comentario
                </p>

                <form action="">
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                            Añade un comentario
                        </label>
    
                        <textarea name="comentario" id="comentario" placeholder="Agrega un comentario" class="border p-2 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>
    
                        @error('comentario')
                        <!-- Con $message imprimimos el mensaje del error que trae laravel -->
                        <p class="bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center rounded-lg">
                            {{ $message }}
                        </p>
                    @enderror
                    </div>

                    <input 
                        type="submit"
                        value="Comentar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                    />
                </form>
            </div>
            @endauth
        </div>
    </div>
@endsection