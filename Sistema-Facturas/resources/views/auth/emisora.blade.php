@extends('layouts.app')

@section('titulo')
    Empresas Emisoras
@endsection

@section('contenido')
<section class="min-h-screen mb-32">
    <div class="relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-center bg-cover min-h-50-screen rounded-xl" style="background-image: url('{{asset ('img/curved-images/curved14.jpg')}}')">
      <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-60"></span>
      <div class="container z-10">
        <div class="flex flex-wrap justify-center -mx-3">
          
        </div>
      </div>
    </div>
    <div class="container">
      <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
        <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-3/4">
          <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-6" >
              {{-- formulario--}}
              <form role="form text-left" action="{{route('emisora.store')}}" method="POST" novalidate>
                @csrf
                {{-- razon social --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="razon_Social">
                        Razón social
                        </label>
                  <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" id="razon_Social" name="razon_Social" type="text" placeholder="Razón social" aria-label="razon-social" aria-describedby="email-addon" />
                </div>
                {{-- correo de contacto --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Correo de contacto
                        </label>
                  <input type="email" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" id="correo" name="email" type="email" placeholder="Correo de sontacto" aria-label="Email" aria-describedby="email-addon" />
                </div>
                {{-- rfc emisor --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rfc">
                        RFC emisor
                        </label>
                  <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" id="rfc" name="rfc" type="text" placeholder="RFC emisor" aria-label="RFC" aria-describedby="password-addon" />
                </div>
                {{-- botn --}}
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Enviar
                    </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection