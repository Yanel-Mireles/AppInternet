<!-- Crear una directiva para incluir la navegacion -->

@extends('layouts.app')

<!-- Crear el contenido que se envia al contenedor(@ yield) -->
@section('titulo')
    @guest
        Facturar
    @endguest

    @auth
        Agregar empresas    
    @endauth

@endsection
