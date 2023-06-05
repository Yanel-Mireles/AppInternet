@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar producto</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="{{route('ver-productos')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" >Vista de productos</a>
              <a href="{{route('productos.index')}}" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Registrar productos</a>
              
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button type="button" class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full" src="https://www.clipartkey.com/mpngs/m/152-1520367_user-profile-default-image-png-clipart-png-download.png" alt="">
                </button>
              </div>

              <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">{{auth()->user()->name}}</a>
                
                <form method="post" style="width: 90%;" action="{{route('logout')}}" >
            @csrf
            <li class="block px-4 py-2 text-sm text-gray-700"><input class="cursor-pointer" type="submit" value="Cerrar Sesión"></li>
        </form>
                
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    
  </nav>

  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
      <div class="flex flex-col justiy-center items-center mx-auto text-center">


    <div class="bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">Formulario de Producto</h2>
        <form method="POST" action="{{route('productos.store')}}">
            @csrf
          <div class="mb-4 flex">
            <label style="width: 200px;" for="descripcionCorta" class=" pr-3 text-gray-700 font-bold">Descripción Corta</label>
            <input type="text" name="descripcionCorta" class="w-3/4 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Descripción Corta" required>
          </div>
          <div class="mb-4 flex">
            <label style="width: 200px;" for="descripcionLarga" class=" pr-3 text-gray-700 font-bold">Descripción Larga</label>
            <textarea name="descripcionLarga" class="w-3/4 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Descripción Larga" required></textarea>
          </div>
          <div class="mb-4 flex">
            <label style="width: 200px;" for="precioVenta" class=" pr-3 text-gray-700 font-bold">Precio de Venta</label>
            <input type="number"  step="0.01" name="precioVenta" class="w-3/4 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Precio de Venta" required>
          </div>
          <div class="mb-4 flex">
            <label style="width: 200px;" for="precioCompra" class=" pr-3 text-gray-700 font-bold">Precio de Compra</label>
            <input type="number"  step="0.01" name="precioCompra" class="w-3/4 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Precio de Compra" required>
          </div>
          <div class="mb-4 flex">
            <label style="width: 200px;" for="stock" class=" pr-3 text-gray-700 font-bold">Stock</label>
            <input type="number"  step="0.01" name="stock" class="w-3/4 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Stock" required>
          </div>
          <div class="mb-4 flex">
            <label style="width: 200px;" for="pesoProducto" class=" pr-3 text-gray-700 font-bold">Peso del Producto</label>
            <input type="number"  step="0.01" name="pesoProducto" class="w-3/4 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Peso del Producto" required>
          </div>
          <button type="submit" class="w-full bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none hover:bg-pink-600">Guardar Producto</button>
        </form>
        
        @if ($errors->any())
        <p class="font-bold text-red-500">{{ $errors->first() }}</p>
        @endif
      </div>

</div>
        
    </div>

</div>
</header>

    <footer class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium">
      <div class="container mx-auto text-center">
        <p class="text-white">© 2023 Todos los derechos reservados.</p>
      </div>
    </footer>
    </div>
  </main>
</div>

  
</body>
</html>
