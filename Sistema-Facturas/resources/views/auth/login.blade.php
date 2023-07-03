@extends('layouts.app')

@section('titulo')
    Inicia sesión en Sistema de Facturacion
@endsection

@section('contenido')
<main class="mt-0 transition-all duration-200 ease-soft-in-out">
    <section>
      <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
        <div class="container z-10">
          <div class="flex flex-wrap mt-0 -mx-3">
            <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
              <div class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                  <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Bienvenido</h3>
                  <p class="mb-0">Ingresa tu email para iniciar sesión</p>
                </div>
                <div class="flex-auto p-6">
                    {{-- no validate para validar cosas del lado del serivdor --}}
                  <form method="POST" action="{{route('login')}}" novalidate>
                    {{-- csrf sirve para evitar ataques de bots y evitar llenar la tabla de datos basura --}}
                    {{-- Tambien crea un token seguro --}}
                    @csrf
                    {{-- Se toma el mensaje que se encuentra en el loginController --}}
                    @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{session('mensaje')}}
                    </p>
                    @endif
                    {{-- Email --}}
                    <label for="email" class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                    <div class="mb-4">
                      <input id="email" name="email" type="text" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow  @error('email') border-red-500 @enderror" value="{{old('email')}}" placeholder="Email" aria-label="Email" aria-describedby="email-addon" />
                    </div>
                    {{-- Password --}}
                    <label for="password" class="mb-2 ml-1 font-bold text-xs text-slate-700">Password</label>
                    <div class="mb-4">
                      <input id="password" name="password" type="password" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid  bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow @error('password') border-red-500 @enderror" value="{{old('password')}}" placeholder="Password" aria-label="Password" aria-describedby="password-addon" />
                    </div>
                    {{-- Check de mantener sesión abierta (esto se mostrara en las cookies)--}}
                    <div class="min-h-6 mb-0.5 block pl-12">
                      <input id="rememberMe" class="mt-0.54 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" checked="" />
                      <label class="mb-2 ml-1 font-normal cursor-pointer select-none text-sm text-slate-700" for="rememberMe">Mantener mi sesión abierta</label>
                    </div>
                    {{-- boton de iniciar sesion --}}
                    <div class="text-center">
                      <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Iniciar sesión</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
            <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
              <div class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
                <div class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10" style="background-image: url('{{asset ('img/curved-images/curved6.jpg')}}')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


@endsection
