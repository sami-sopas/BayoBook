@extends('layouts.app')

@section('titulo')
    Creando Publicacion
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-lg mt-10 md:mt-8">
            <form method="POST" action=" {{ route('login')}}" novalidate> <!-- novalidate, desactiva la validacion de HTML y activa la de laravel -->
                @csrf <!-- Esto sirve para evitar ataques XCROSS -->

                @if (session('mensaje')) 
                    <!-- Aqui es donde se usa el return back() del loginController -->
                    <p class="bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center rounded-lg">
                        {{ session('mensaje') }}
                    </p>    
                @endif

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input type="text"
                        id="titulo"
                        name="titulo"
                        placeholder="Titulo de la publicacion"
                        class="border p-2 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('titulo') }}"
                    />

                    @error('titulo')
                    <!-- Con $message imprimimos el mensaje del error que trae laravel -->
                    <p class="bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center rounded-lg">
                        {{ $message }}
                    </p>
                @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>

                    <textarea name="descripcion" id="descripcion" placeholder="Descripcion de la publicacion" class="border p-2 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>

                    @error('titulo')
                    <!-- Con $message imprimimos el mensaje del error que trae laravel -->
                    <p class="bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center rounded-lg">
                        {{ $message }}
                    </p>
                @enderror
                </div>

                <input 
                type="submit"
                value="Publicar"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            />
            </form>
                
        </div>
    </div>

@endsection