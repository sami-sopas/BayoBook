@extends('layouts.app')

@section('titulo')
    Perfil de {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <!-- En dispositivos pequeños tomaremos todo el tamaño
             En medianos 8 de 12 columnas
             Y en largos 6 de 12 columnas -->
        <div class="w-full md:w-8/12 lg:x-6/12 flex flex-col items-cnter md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5 ">
                <img src="{{ asset('img/user_avatar.png') }}" alt="user-avatar">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <!-- Esto imprime el nombre del usuario actual
                     Recordar que el objeto user se envia desde en el PostController -->
                <p class="text-gray-700 text-2xl">
                    {{ $user->username }}
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Posts</span>
                </p>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        <!-- en tamaño mediano se mostraran 2 columnas, 
            en tamaño grande 3, y en tamaño muy grande 4 columnas
        -->
        @if ($posts->count()) 
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"> 
            <!--Mostrar que no hay publicaciones en caso de -->
            @foreach ($posts as $post)
            <div>               <!-- le pasamos un arreglo con las variables que ocupa -->
                <a href="{{ route('posts.show',['user' => $user,'post' => $post])}}">
                    <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="imagen-post {{$post->titulo}}">
                </a>
            </div>            
            @endforeach
        @else
                <!--Mostrar que aun no hay publicaciones-->
                <div class="text-gray-600 uppercase text-sm text-center font-bold">
                    No hay posts
                </div>
        @endif

       </div>

       <div class="my-10">
        {{ $posts->links()}}
      </div>
    </section>

@endsection