<!-- Crear una directiva para incluir la navegacion -->

@extends('layouts.app')

<!-- Crear el contenido que se envia al contenedor(@ yield) -->
@section('titulo')
  Buscar factura
@endsection

@section('contenido')

    <!-- resources/views/auth/principal.blade.php -->
<section class="min-h-screen mb-32">
  <div class="relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-center bg-cover min-h-50-screen rounded-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg')">
      <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-60"></span>
      <div class="container z-10">
          <div class="flex flex-wrap justify-center -mx-3">
              <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
                  <h1 class="mt-12 mb-2 text-white">Bienvenido</h1>
                  <p class="text-white">Ingresa los datos para buscar la factura.</p>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
          <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
              <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                  <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                      <div class="flex-auto p-6">
                        {{-- form buscar factura --}}
                          <form role="form text-left" action="{{route('buscar.factura')}}" method="POST">
                            @csrf  
                            <!-- Empresa emisora -->
                              <div class="mb-4">
                                  <label class="text-sm text-gray-700" for="emisor_id">Empresa Emisora:</label>
                                  <select id="emisor_id" name="emisor_id" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                      @foreach($emisores as $emisor)
                                          <option value="{{ $emisor->id }}">{{ $emisor->razon_Social }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <!-- Receptor -->
                              <div class="mb-4">
                                  <label class="text-sm text-gray-700" for="receptor_id">Empresa Receptora:</label>
                                  <select id="receptor_id" name="receptor_id" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                      @foreach($receptores as $receptor)
                                          <option value="{{ $receptor->id }}">{{ $receptor->razon_Social }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="mb-4">
                                <label class="text-sm text-gray-700" for="receptor_rfc">Empresa Receptora rfc:</label>
                                <select id="receptor_rfc" name="receptor_rfc" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                    @foreach($receptores as $receptor)
                                        <option value="{{ $receptor->id }}">{{ $receptor->rfc }}</option>
                                    @endforeach
                                </select>
                            </div>
                              <!-- Folio -->
                              <div class="mb-4">
                                  <label class="text-sm text-gray-700" for="folio">Folio:</label>
                                  <input type="text" id="folio" name="folio" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Folio (opcional)">
                              </div>
                              <div class="text-center">
                                  <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Buscar</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  {{-- ! Muestra la tabla de la factura buscada --}}
  @if (session('success'))
  <div class="alert alert-success">
      <div class="my-10 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
          <h1 class="text-black text-sm lg:text-2xl text-center font-bold">Facura seleccionada</h1>
          <div
              class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg my-4">
              <table class="min-w-full">
                  <thead>
                      <tr>
                          <th
                              class="px-6 py-3 border-b-2 border-gray-300 text-center leading-4 text-blue-500 tracking-wider">
                              ID
                          </th>
                          <th
                              class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                              Empresa Emisora
                          </th>
                          <th
                              class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                              Empresa Receptora
                          </th>
                          <th
                              class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                              Folio de Factura
                          </th>
                          <th
                              class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                              Archivo PDF
                          </th>
                          <th
                              class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                              Archivo XML
                          </th>
                          <th
                              class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                              Fecha de Creación
                          </th>
                          <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                      </tr>
                  </thead>
                  <tbody class="bg-white">
                      @foreach ($facturas as $factura)
                          {{-- ! Si el di de Factura que se encuentra en la tabla
                      ! es igual al id de la factura que se selecciono en el formulario    
                      ! muestra la tabla --}}
                          @if ($factura->id == session('success'))
                              <tr>
                                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                      <div class="flex items-center">
                                          <div>
                                              <div class="text-sm leading-5 text-gray-800 text-center">
                                                  #{{ $factura->id }}
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                      <div class="text-sm leading-5 text-blue-900 text-center">
                                          {{ $factura->emisor->razon_Social }}
                                      </div>
                                  </td>
                                  <td
                                      class="px-6 py-4whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5 text-center">
                                      {{ $factura->receptor->razon_Social }}</td>
                                  <td
                                      class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5 text-center">
                                      {{ $factura->folio }}</td>

                                  <!-- Para el icono de PDF -->
                                  <td class="px-12 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900">
                                      @if ($factura->archivopdf)
                                          <a href="{{ asset('uploadspdf/' . $factura->archivopdf) }}" download>{{ $factura->archivopdf }}</a><br/>

                                      @else
                                          N/A
                                      @endif
                                  </td>

                                  <!-- Para el icono de XML -->
                                  <td class="px-12 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900">
                                      @if ($factura->archivoxml)
                                          {{-- <a href="{{ asset('xml/' . $factura->archivos_xml) }}"
                                              target="_blank"> --}}
                                          <a href="{{ asset('uploadsxml/' . $factura->archivoxml) }}" download>{{ $factura->archivoxml }}</a><br/>

                                      @else
                                          N/A
                                      @endif
                                  </td>


                                  <td
                                      class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5 text-center">
                                      {{ $factura->created_at->format('d-m-Y') }}
                                  </td>
                              </tr>
                          @endif
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
@else
  {{-- ! Factura no encontrada --}}
  <div class="alert alert-danger">
      <div class="my-10 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
          <h1 class="text-black text-sm lg:text-2xl text-center font-bold">Factura no encontrada</h1>
      </div>
  </div>
@endif
</section>



 
@endsection