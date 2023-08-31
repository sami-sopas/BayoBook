@extends('layouts.app')

@section('titulo')
    <!-- Aqui esta la variable que le pasamos desde el controlador -->
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            1
        </div>
        <div class="md:w-1/2">
            2
        </div>
    </div>
@endsection