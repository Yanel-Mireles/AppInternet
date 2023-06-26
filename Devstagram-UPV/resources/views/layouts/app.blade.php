<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Página principal</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
       
        
        
        <!--styles -->
        @stack('styles')
    </head>

    <body class="h-full">

        <header class="p-5 border-b bg-zinc-950 shadow">
          <div class="container mx auto flex justify-between items-center bg-zinc-950">
            <h1 class="text-3xl font-bold text-zinc-50">
              <a href="{{ url('/') }}">Devstagram</a>
            </h1>
            {{-- Aplicar Helper de autenticación auth para verificar si esta autenticado --}}
            @auth
            <!--Vinculo para boton de publicar un post -->
            <a href="{{route('post.create')}}" class="felx items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                </svg>
  
              Crear</a>
            <nav class="flex gap-2 items-center">
                <span class="text-zinc-100">Hola: </span>

                <a href="{{ route('post.index', auth()->user()->username) }}">
                  <span class="font-normal text-zinc-100">
                    {{auth()->user()->username}}
                  </span>
                </a>
                
                  
                  {{-- Agregar seguridad a logout --}}
                <form method="POST" action="{{route('logout')}}">
                  @csrf
                  <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar sesión</button>
                </form>
            </nav>
            @endauth

            {{-- Determinar a usuario no autenticado --}}
            @guest
            <nav class="flex gap-2 items-center">
              <a class="font-bold uppercase text-zinc-50 text-sm" href="{{route('login')}}"> Login</a>
              <a class="font-bold uppercase text-zinc-50 text-sm"  href="crearCuenta"> Registrar usuario</a>
            </nav>
            @endguest
            
            {{-- Navegación --}}
            
          </div>
        </header>

        <main class="container mx-auto mt-10">
          {{-- @yield('header')
           
          <br> --}}
          <h1 class="font-black text-center text-4xl mb-10 text-blue-950">@yield('titulo')</h1>
          
          @yield('contenido')
        </main>

        <footer class="bg-zinc-950 py-6">
          <div class="container mx-auto px-6 text-zinc-50 text-center text-lg" >
              <p>Copyright &copy; Yanel
                  <span id="date"></span>. all rights reserved {{now()->year}}</p>
          </div>
        </footer>

    </body>
</html>
