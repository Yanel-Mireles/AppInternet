<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portal - @yield('titulo')</title>

        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
            <!-- Fonts and icons -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Nucleo Icons -->
        <link href="public/build/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="public/build/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Main Styling -->
        <link href="../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>

        {{-- @vite ('resources/css/Tailwindstyles.css') --}}
        @vite ('resources/js/app.js')

        {{-- Estilos dropzone --}}
        @stack('styles')


    </head>
    <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
      {{-- Aplicar Helper de autenticacion auth para verificar si esta autenticado --}}
      @auth
      <div class="container sticky top-0 z-sticky">
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 flex-0">
            <!-- {{-- Navegacion --}} -->
            @auth
            <!-- Navbar -->
            <nav class="absolute top-0 left-0 right-0 z-30 flex flex-wrap items-center px-4 py-2 mx-6 my-4 shadow-soft-2xl rounded-blur bg-white backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-start">
              <div class="flex items-center justify-between w-full p-0 pl-6 mx-auto flex-wrap-inherit">
                <a class="py-2.375 text-lg mr-4 ml-4 whitespace-nowrap font-bold text-slate-700 lg:ml-0" href="/"> Sistema de facturación </a>
                <button navbar-trigger class="px-3 py-1 ml-2 leading-none transition-all bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-lg ease-soft-in-out lg:hidden" type="button" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6 h-6 bg-none">
                    <span bar1 class="w-5.5 rounded-xs relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                    <span bar2 class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                    <span bar3 class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                  </span>
                </button>
                <div navbar-menu class="items-center flex-grow overflow-hidden transition-all duration-500 ease-soft lg-max:max-h-0 basis-full lg:flex lg:basis-auto">
                  <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">
                    <li>
                      <a class="flex items-center px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 lg:px-2" aria-current="page" href="{{route('empresa.emisora')}}">
                        <i class="mr-1 fa fa-chart-pie opacity-60"></i>
                        Registar empresa emisora
                      </a>
                    </li>
                    <li>
                      <a class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 lg:px-2" href="{{route('empresa.receptora')}}">
                        <i class="mr-1 fa fa-chart-pie opacity-60"></i>
                        Registrar empresa receptora
                      </a>
                    </li>
                    <li>
                      <a class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 lg:px-2" href="{{route('factura.tabla')}}">
                        <i class="mr-1 fa fa-chart-pie opacity-60"></i>
                        Registrar factura
                      </a>
                    </li>
                    
                    
                  </ul>
                  
                  <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">
                    <li>
                      <a class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 lg:px-2" href="/">
                        <i class="mr-1 fa fa-user opacity-60"></i>
                          Hola:
                        <span class="font-normal">
                            {{-- Se agrega direccionamiento al hacer click redireccionara al dashboard del usuario --}}
                            {{-- <a href="{{route('post.index',auth()->user()->username)}}"> --}}
                            {{auth()->user()->username}}
                            {{-- </a> --}}
                        </span>
                      </a>
                      
                    </li>
                    <li>
                      <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-8 py-2 text-center align-middle font-bold uppercase text-white transition-all">Cerrar sesión</button>
                    </form>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            @endauth
          </div>
        </div>
      </div>

    @endauth
        <!-- {{-- Encabezado de la pagina --}} -->
        <header class="bg-white p-5 border-b shadow">
            <div class="bg-white container mx-auto flex justify-between items-center">
                <a href="{{route('dashboard')}}">
                <h1 class="text-3xl font-black">Sistema de Facturaciones</h1>
                </a>
                

                {{-- Determinar a usuario no autenticado --}}
                @guest
                    {{-- <p> No autenticado </p> --}}
                    <!-- {{-- Navegacion --}} -->
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Login</a>                        
                        {{-- creamos una ruta dinamica que su cambio se hace desde el archivo web.php --}}
                        {{-- <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear cuenta</a> --}}
                    </nav>
                @endguest

            </div>
        </header>

        <!-- Contenido para cada una de las vistas -->
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>
        <!-- Pie de pagina -->
        <footer class="py-12">
            <div class="container">
              <div class="flex flex-wrap -mx-3">
                
                <div class="flex-shrink-0 w-full max-w-full mx-auto mt-2 mb-6 text-center lg:flex-0 lg:w-8/12">
                  <a href="/"  class="mr-6 text-slate-400">
                    <span class="text-lg fab fa-dribbble"></span>
                  </a>
                  <a href="/"  class="mr-6 text-slate-400">
                    <span class="text-lg fab fa-twitter"></span>
                  </a>
                  <a href="/"  class="mr-6 text-slate-400">
                    <span class="text-lg fab fa-instagram"></span>
                  </a>
                  <a href="/"  class="mr-6 text-slate-400">
                    <span class="text-lg fab fa-pinterest"></span>
                  </a>
                  <a href="/"  class="mr-6 text-slate-400">
                    <span class="text-lg fab fa-github"></span>
                  </a>
                </div>
              </div>
              <div class="flex flex-wrap -mx-3">
                <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
                  <p class="mb-0 text-slate-400">
                    Copyright ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    Yanel. Todos los derechos reservados.
                  </p>
                </div>
              </div>
            </div>
          </footer>
    </body>

    <!-- plugin for scrollbar  -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>
</html>
