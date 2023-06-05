@extends('layouts.app')

{{-- contenido del titulo --}}
@section('titulo')
    Registrate!
@endsection 

{{-- DIv de contenido --}}
@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            {{-- Colocar una imagen --}}
            <img src="{{asset ('img/18.jpg')}}" alt="registro de usuarios">
        </div>    
    
        <div class="md:w-4/12 bg:purple-500 p-5 rounded-lg shadow-xl">
            {{-- Aquí comienza el formulario de registro de usuarios con los diferentes div para el formato de los inputs--}}
            <form action="{{route('register')}}" method="POST" novalidate>
                {{-- csrf sirve para evitar ataques de bots y evitar llenar la tabla de datos basura --}}
                {{-- Tambien crea un token seguro --}}
                @csrf

                {{-- Name --}}
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-pink-500 font-bold">
                        Nombre
                    </label>
                    <input id="name" type="text" name="name" placeholder="Tu nombre" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{old('name')}}">
                     {{-- old funciona para no eliminar la casilla roja hasta que se quite el error --}}
                
                      {{-- Directiva para mostrar mensaje de error--}}
                    @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
                    @enderror
                    </div>
                
                {{-- Username --}}
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-pink-500 font-bold">
                        Username
                    </label>
                    <input id="username" type="text" name="username" placeholder="Tu username" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"  value="{{old('username')}}">
                </div>

                {{-- Email --}}
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-pink-500 font-bold">
                        Email
                    </label>
                    <input id="email" type="text" name="email" placeholder="Tu email de registro" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}">
                </div>
                
                
                
                {{-- Password --}}
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-pink-500 font-bold">
                        Password
                    </label>
                    <input id="password" type="password" name="password" placeholder="Tu password de registro" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" value="{{old('password')}}">
                </div>
                {{-- Password Confirmation --}}
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-pink-500 font-bold">
                        Password
                    </label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Repetir password" class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror" value="{{old('password_confirmation')}}">
                </div>
                <input type="submit" value="crear cuenta" class="bg-pink-600 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>  
    </div>

@endsection

