@extends('layouts.app')

@section('titulo')
Crea una nueva publicacion
@endsection()

{{---directV paea integrar los estilos de dropzone---}}
@push('styles')
    {{--enlaces de dropzone--}}
        
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

{{-- Div de contenido --}}
@section('contenido')
    <div class="md:flex ms:items-center">
        <div class="md:w-1/2 px-10">
            imagen
            <!-- Esta es la zona donde se puede arrastrar y soltar o seleccionar el archivo de imagen -->
            <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center mb-5" novalidate>
                @csrf
            </form>
        </div>
        <div class="md:w1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mr-0">
            <form action="{{route('posts.store')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo de la publicacion" class="border p-3 w-full rounded-lg"
                    @error('titulo')
                        border-red-500
                    @enderror
                    value="{{old('titulo')}}"
                    >
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}} </p>                        
                    @enderror
                </div>
                <!--textarea -->
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea name="descripcion" id="descripcion" placeholder="Descripción de la imagen" value="{{old('descripcion')}}" class="border p-3 w-full rounded-lg 
                    @error('descripcion')
                     border-red-500 
                     @enderror">
                        
                    </textarea>
                    @error('descripcion') 
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p> 
                    @enderror
                </div>
                <!--agregar campo oculto para guaradar el calos de la imagen -->
                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{old('imagen')}}">
                    @error('imagen') 
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p> 
                    @enderror
                </div>
                <input type="submit" value="Publicar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
