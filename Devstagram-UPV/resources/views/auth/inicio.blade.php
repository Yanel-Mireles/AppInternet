<!-- Crear una directiva para incluir la navegacion -->
@extends('layouts.app')
<!-- Crear el contenido que se le envia al contenedor -->

{{-- Seccion para asignar el titulo --}}
@section('titulo')
    Bienvenido a mi Devstagram
@endsection

{{-- Seccion para asignar el header --}}
@section('header')
    <!-- Sección del encabezado -->
    <header class="bg-white" style="background-image: url('./img/city4.jpg');">
        <div class="mx-auto max-w-7x1 px-2 py-60 sm:px-2 lg:px-8">
            <!-- Contenido del encabezado -->
            <div class="bg-cover bg-center py-12">
                <div class="container mx-auto px-4 text-top text-center text-gray-600">
                    <!-- Contenido adicional del encabezado -->
                    <p class="text-8xl font-bold text-bold text-violet-50">Hola, este es mi Devstagram!</p>
                </div>
            </div>
            <div class="container mx-auto max-w-7xl text-center py-2 sm:px-2 lg:px-8">
                <!-- Contenido adicional después del encabezado -->
                <p class="text-5xl font-bold text-yellow-300">Yanel</p>
            </div>
        </div>
        
    </header>
    
@endsection

@section('contenido')
    <!-- Sección del contenido principal -->
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Contenido principal de la página -->
           ...
        </div>
    </main>
@endsection
