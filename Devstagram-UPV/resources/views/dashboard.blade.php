@extends('layouts.app')

@section('titulo')
    Perfil :>{{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center">
            <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
                <div class="md:w8/12 lg:w-6/12 px-5">
                    <img src="{{ asset('img/usuario.svg')}}" alt="Imagen de usuario"/>
                </div>
                <div class="md:8/12 lg:w6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                    <p class="text-gray-700 text-2x1">{{auth()->user()->username}}</p>
                    <!--Agregando estructura para el dashboard de publicaciones -->
                    <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                        0
                        <span class="font-normal">Seguidores</span>
                    </p>
                    <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                        0
                        <span class="font-normal">Siguiendo</span>
                    </p>
                    <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                        0
                        <span class="font-normal">Post</span>
                    </p>
                    {{-- <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{ $posts->count() }}
                        <span class="font-normal">Post{{ $posts->count() > 1 ? 's' : '' }}</span>
                    </p> --}}
                </div>
            </div>
    </div>
    {{-- <div class="flex justify-center items-center">

        <div class="md:w-8/12 lg:w-6/12 flex flex-col px-5 ">
            @foreach ($posts as $post)
                <div class="flex flex-col bg-white shadow-md items-center rounded-md p-5 mb-8 w-full">
                    <h2 class="text-2xl mb-2">{{ $post->titulo }}</h2>
                    <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen del post" class="w-full h-auto mb-2">
                    <p class="text-gray-700">{{ $post->descripcion }}</p>
                </div>
            @endforeach
        </div>
    </div> --}}

    {{-- mostrar los post de publicacion obtenidos desde el postController metodo index --}}
    {{-- <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        {{-- listamos publicaciones 
        @if($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a>
                            <img src="{{asset('uploads/').'/'.$post->imagen}}" alt="Imagen del post" {{$post->titulo}}>
                        </a>
                    </div>
                    
                @endforeach
            </div>
        @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold"> No hay publicaiones</p>
        @endif
    </section> --}}

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        @if ($posts->count())
            {{-- listamos publicaciones --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post )
                    <div>
                        <a href="{{ route('post.show', ['user' => $user->username, 'post' => $post->id]) }}">
                            <img src="{{asset('uploads/'). '/' . $post->imagen}}" alt="Imagen del Post">
                            {{-- <h2 class="justify-center text-center">Titulo: {{ $post->titulo }}</h2>
                            <p class="justify-center text-center">Descripcion: {{ $post->descripcion }}</p> --}}
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold"> No hay publicaciones</p>
        @endif
    </section>
    
@endsection