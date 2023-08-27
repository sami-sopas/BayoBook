<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BayoBook - @yield('titulo')</title>
        <!-- Indicardor de que usara vite -->
        
        @vite('resources/css/app.css')
        <script src="{{ 'js/app.js'}}" defer></script>
    </head>
    <body class="bg-gray-100">

        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">BayoBook</h1>

                <!-- Usando la directiva de auth para saber si el usuario esta autenticado,
                    y asi mostrar el boton de cerrar sesion cuando lo este -->
                @auth
                    <!-- <p>Autenticado</p> -->
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold text-gray-600" 
                            href="{{ route('posts.index',auth()->user()->username)}}">
                            Hola: 
                            <span class="font-normal">
                                {{ auth()->user()->username }}
                            </span>
                        </a>
                            <!-- El route lee las rutas que tengramos registradas en el web.php mediante ->name() -->

                         <!-- Cambiamos el <a> a un FORM para evitar ataques CrossRequest, de esta manera
                              consultamos al servidor primero  -->   
                        <form method="POST" action="{{ route('logout')}}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600" 
                            href="{{ route('logout') }}">Cerrar sesion</button>
                        </form>
                        
                    </nav>
                @endauth

                <!-- Guest para usuarios que no esten autenticados aun -->
                @guest
                    <!-- <p>No autenticado</p> -->
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-gray-600" 
                            href="{{ route('login')}} ">Login</a>
                            <!-- El route lee las rutas que tengramos registradas en el web.php mediante ->name() -->
                        <a class="font-bold uppercase text-gray-600" 
                            href="{{ route('register') }}">Crear Cuenta</a>
                    </nav>
                @endguest
 

            </div>
        </header>

        <main class="container mx-auto mt-10">

            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>

            @yield('contenido')

        </main>

        <footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10">
            BayoBook- Todos los derechos reservados 
            {{
                //Imprimir el año actual
                now()->year
            }}
        </footer>
        
    </body>

</html>