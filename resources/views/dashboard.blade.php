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
@endsection