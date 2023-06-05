@extends('layouts.app')

@section('titulo')
    Inicia sesión en Devstagram UPV
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
        {{-- Colocar una imagen --}}
        <img src="{{asset ('img/login.jpg')}}" alt="login de usuarios">
    </div>    

    <div class="md:w-4/12 bg:purple-500 p-5 rounded-lg shadow-xl">
        {{-- Aquí comienza el formulario de registro de usuarios con los diferentes div para el formato de los inputs--}}
        <form action="{{route('login')}}" method="POST" novalidate>
            {{-- csrf sirve para evitar ataques de bots y evitar llenar la tabla de datos basura --}}
            {{-- Tambien crea un token seguro --}}
            @csrf
            @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                text-center">
                    {{session('mensaje')}}
                </p>
            @endif

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

            {{-- Check de mantener sesión abierta --}}
            <div class="mb-5<">
                <input type="checkbox" name="remember">
                    <label class="text-gray-500 text-sm">mantener mi sesión abierta</label>
            </div>


            <input type="submit" value="iniciar sesion" class="bg-pink-600 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>  
</div>
@endsection