<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BayoBook - @yield('titulo')</title>
        <!-- Indicardor de que usara vite -->
        
        @vite('resources/css/app.css')
    </head>
    <body>
        <h1 class="text-4xl font-extrabold">Estas en -@yield('titulo')</h1>
    </body>

</html>