@extends('layouts.app')

@section('titulo')
Listado de empresas receptoras
@endsection


@section('contenido')

<div class="container">

    <a href="{{ route('crearEmpresaReceptora') }}"  class="w-full inline-block px-6 py-3 mr-3 font-bold text-center uppercase align-middle transition-all bg-transparent border rounded-lg cursor-pointer border-gray-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-gray-600">Agregar empresa receptora</a>
    <div class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <div class="w-full px-6 py-6 mx-auto">
          <!-- table de empresas receptoras -->
    
          <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
              <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                
                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                      <thead class="align-bottom">
                        <tr>
                          <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">ID</th>
                          <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nombre</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Dirección</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">RFC</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Contacto</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Razón social</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email</th>
                        </tr>
                      </thead>
                      {{-- /* Este bloque de código es el encargado de mostrar los datos de las "empresas
                      receptoras" en formato de tabla. */ --}}
                      <tbody>
                        @forelse($receptoras as $receptora)
                        <tr>
                          {{-- id --}}
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal">{{ $receptora->id }}</h6>
                              </div>
                            </div>
                          </td>
                          {{-- nombre --}}
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal">{{ $receptora->nombre }}</h6>
                              </div>
                            </div>
                          </td>
                          {{-- direccion --}}
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal">{{ $receptora->direccion }}</h6>
                              </div>
                            </div>
                          </td>
                          {{-- rfc --}}
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal">{{ $receptora->rfc }}</h6>
                              </div>
                            </div>
                          </td>
                          {{-- contacto --}}
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal">{{ $receptora->contacto }}</h6>
                              </div>
                            </div>
                          </td>
                          {{-- razon social --}}
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal">{{ $receptora->razon_Social }}</h6>
                              </div>
                            </div>
                          </td>
                          {{-- email --}}
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal">{{ $receptora->email }}</h6>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @empty
                        <tr>
                        <td colspan="6" class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                          <div class="flex px-2 py-1">
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 text-sm leading-normal">No hay empresas receptoras registradas.</h6>
                            </div>
                          </div>
                        </td>
                      </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection