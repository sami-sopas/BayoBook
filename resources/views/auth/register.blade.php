@extends('layouts.app')

@section('titulo')
    Registrate en BayoBook
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-7 md:items-center">
        <div class="md:w-1/3 p-2">
            <img src="{{ asset('img/register.png') }}" alt="imagen-registro-usuarios">
        </div>
        
        <div class="md:w-2/5 bg-white p-4 rounded-lg shadow-lg">
            <form action="{{ route('register')}}" method="POST" novalidate> <!-- novalidate, desactiva la validacion de HTML y activa la de laravel -->
                @csrf <!-- Esto sirve para evitar ataques XCROSS -->
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input type="text"
                        id="name"
                        name="name"
                        placeholder="Tu nombre"
                        class="border p-2 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}"
                    />                          <!-- Cuando haya un error, se aplica un estilo al input -->
                                                <!-- Con value old(), hacemos que no se borre lo anterior que escribio el usuario -->

                    <!-- Directiva en caso de error, la validacion se hace en el controlador -->
                    @error('name')
                        <!-- Con $message imprimimos el mensaje del error que trae laravel -->
                        <p class="bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center rounded-lg">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input type="text"
                        id="username"
                        name="username"
                        placeholder="Tu nombre de Usuario"
                        class="border p-2 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}"
                    />

                    @error('username')
                    <!-- Con $message imprimimos el mensaje del error que trae laravel -->
                    <p class="bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center rounded-lg">
                        {{ $message }}
                    </p>
                @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input type="text"
                        id="email"
                        name="email"
                        placeholder="Tu email"
                        class="border p-2 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"
                    />

                    @error('email')
                    <!-- Con $message imprimimos el mensaje del error que trae laravel -->
                    <p class="bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center rounded-lg">
                        {{ $message }}
                    </p>
                @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input type="password"
                        id="password"
                        name="password"
                        placeholder="Tu contraseña"
                        class="border p-2 w-full rounded-lg @error('password') border-red-500 @enderror"
                    />

                    @error('password')
                    <!-- Con $message imprimimos el mensaje del error que trae laravel -->
                    <p class="bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center rounded-lg">
                        {{ $message }}
                    </p>
                @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Contraseña
                    </label>
                    <input type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repite tu contraseña"
                        class="border p-2 w-full rounded-lg"
                    />
                </div>

                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection