@extends('layouts.app')

@section('titulo')
    Tu Cuenta
@endsection

@section('contenido')
    <div class="flex justify-center">
        <!-- En dispositivos pequeños tomaremos todo el tamaño
             En medianos 8 de 12 columnas
             Y en largos 6 de 12 columnas -->
        <div class="w-full md:w-8/12 lg:x-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/user_avatar.png') }}" alt="user-avatar">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <!-- Esto imprime el nombre del usuario actual -->
                <p class="text-gray-700 text-2xl">
                    {{ auth()->user()->username }}
                </p>
            </div>
        </div>
    </div>
@endsection