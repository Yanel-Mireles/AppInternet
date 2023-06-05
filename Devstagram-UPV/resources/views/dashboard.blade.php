@extends('layouts.app')

@section('titulo')
    Tu cuenta de devstagram UPV
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
                </div>
            </div>
    </div>
@endsection