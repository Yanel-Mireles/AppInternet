
@extends('layouts.app')

@section('titulo')
Listado de empresas emisoras
@endsection


@section('contenido')

<div class="container">

    <a href="{{ route('crearEmpresaEmisora') }}"  class="inline-block w-full px-8 py-2 mb-0 font-bold text-center text-black uppercase transition-all ease-in bg-white border-0 border-white rounded-lg shadow-soft-md bg-150 leading-pro text-xs hover:shadow-soft-2xl hover:scale-102">Agregar empresa emisora</a>
    <div class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <div class="w-full px-6 py-6 mx-auto">
          <!-- table 1 -->
    
          <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
              <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                
                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                      <thead class="align-bottom">
                        <tr>
                          {{-- columnas de tablas --}}
                          <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">ID</th>
                          <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Razón social</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">RFC</th>
                          
                        </tr>
                      </thead>
                     {{-- /* El código que proporcionó es un ciclo que itera sobre una colección de
                     "emisoras" (empresas) y genera una fila de tabla para cada "emisora" en la
                     colección. */ --}}
                      <tbody>
                        @forelse($emisoras as $emisora)
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal">{{ $emisora->id }}</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal">{{ $emisora->razon_Social }}</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal">{{ $emisora->email }}</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal">{{ $emisora->rfc }}</h6>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @empty
                        <tr>
                        <td colspan="4" class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                          <div class="flex px-2 py-1">
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 text-sm leading-normal">No hay empresas emisoras registradas.</h6>
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