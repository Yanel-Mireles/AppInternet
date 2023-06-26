@extends('layouts.app')

@section('titulo')
Vista del post
@endsection

@section('contenido')
{{--Creación de un elemento de sección con una clase de "contenedor mx-auto mt-10", que probablemente se
utilice con fines de estilo. --}}
<section class="container mx-auto mt-10">
    <div class="flex justify-center items-center">
        <div class="w-1/2">
            <img src="{{ asset('uploads/'.$post->imagen) }}" alt="Imagen del Post" class="w-full">
        </div>
        <div class="w-1/2 bg-white p-4 min-h-[400px]">
            <h2 class="text-4xl font-black">{{ $post->titulo }}</h2>
            <p class="text-gray-600">{{ $post->descripcion }}</p>
            <p class="text-sm text-gray-500">
                {{$post->created_at->diffForHumans()}}
            </p>

            @guest
                <p class="text-gray-600">Debes iniciar sesión para comentar.</p>
            @else
                {{-- Este código está creando un formulario para permitir a los usuarios agregar
                comentarios a una publicación.  --}}
                <form action="{{route('comment.store', ['post' => $post]) }}" method="POST">
                    @csrf
                    <div>
                        <textarea name="content" rows="4" class="w-full bg-gray-100 p-2 mt-4" placeholder="Escribe un comentario"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4">Agregar comentario</button>
                    </div>
                </form>
            @endguest
            
            <div class="mt-6">
                <h3 class="text-2xl font-bold">Comentarios</h3>
                <div class="overflow-auto h-64">
                    @if($comments->count())
                    @foreach ($comments as $comment)
                        <div class="bg-gray-100 p-2 mt-2">
                            <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
                            <span class="text-xs text-gray-500">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
                            {{--  Este bloque de código verifica si el usuario autenticado es el
                            propietario de la publicación y, de ser así, muestra un formulario para
                            eliminar el comentario. --}}
                            @if (auth()->check() && auth()->user()->id === $post->user_id)
                                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 mt-2">Eliminar comentario</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                    @else
                        <p>No hay comentarios</p>
                    @endif
                </div>
                {{-- Este bloque de código verifica si el usuario autenticado es el propietario de la
                publicación y, de ser así, muestra un formulario para eliminar la publicación.--}}
                @if (auth()->check() && auth()->user()->id === $post->user_id)
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 mt-4">Eliminar post</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

