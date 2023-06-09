@extends('layouts.app')

@section('titulo')
    Perfil {{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{asset('img/usuario.svg')}}" alt="Imagen de usuario"/>
            </div>
                
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                
                <p class="text-gray-700 text-2x1"></p>

                {{-- Agregando estructura base para dashboard de publicaciones --}}
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $posts->total() }}
                    <span class="font-normal">Post{{ $posts->total() > 1 ? 's' : '' }}</span>
                </p>
                
            </div>
        </div>
    </div>

    {{-- Mostrar los post de publicación obtenidos desde el PostController método index --}}

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        
        @if ($posts->count())
            {{-- listamos publicaciones --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols4 gap-6">
                @foreach ($posts as $post )
                    <div>
                        <a href="{{route('post.show', ['user' => $user->username, 'post' => $post->id])}}">
                            <img src="{{asset('uploads/'). '/' . $post->imagen}}" alt="Imagen del Post">
                            <h2 class="justify-center text-center">Titulo: {{ $post->titulo }}</h2>
                            <p class="justify-center text-center">Descripcion: {{ $post->descripcion }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        {{-- Este bloque de código es una sentencia `else` que se ejecuta cuando la condición de la
        sentencia --}}
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold"> No hay publicaciones</p>
        @endif

       {{-- condicional que comprueba si el usuario es un invitado (no ha iniciado
       sesión). Si el usuario es un invitado, muestra un mensaje que le pide que inicie sesión para
       comentar. Si el usuario no es un invitado (inició sesión), no muestra nada.--}}
        @guest
            <p class="text-gray-600 uppercase text-sm text-center font-bold">Debes iniciar sesión para comentar.</p>
        @endguest
    </section>
@endsection
