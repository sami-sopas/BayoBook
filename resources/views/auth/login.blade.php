@extends('layouts.app')

@section('titulo')
    Inicia Sesion
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-7 md:items-center">
        <div class="md:w-1/3 p-2">
            <img src="{{ asset('img/register.png') }}" alt="imagen-login-usuarios">
        </div>
        
        <div class="md:w-2/5 bg-white p-4 rounded-lg shadow-lg">
            <form method="POST" action=" {{ route('login')}}" novalidate> <!-- novalidate, desactiva la validacion de HTML y activa la de laravel -->
                @csrf <!-- Esto sirve para evitar ataques XCROSS -->

                @if (session('mensaje')) 
                    <!-- Aqui es donde se usa el return back() del loginController -->
                    <p class="bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center rounded-lg">
                        {{ session('mensaje') }}
                    </p>    
                @endif

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

                <input 
                    type="submit"
                    value="Iniciar sesion"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection