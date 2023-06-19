@extends('layouts.app')

@section('titulo')
Vista del post
@endsection()

{{-- Div de contenido --}}

@section('contenido')
<section class="container mx-auto md:flex gap-6">
    <div class="flex justify-center items-center">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen del Post">
        </div>
        <div class="md:w-1/2 p-5 shadow-lg md:rounded-lg bg-white min-h-[400px]">
            <div>
                <h2 class="text-4xl font-black">{{ $post->titulo }}</h2>
                <p class="text-gray-600">{{ $post->descripcion }}</p>
            </div>
        </div>
    </div>
</section>
@endsection