@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
    Crear factura
@endsection

@section('contenido')
<section class="min-h-screen mb-32">
    <div class="relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-center bg-cover min-h-50-screen rounded-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg')">
      <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-60"></span>
      <div class="container z-10">
        <div class="flex flex-wrap justify-center -mx-3">
          
        </div>
      </div>
    </div>
    <div class="container">
      <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
        <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
          <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-6">
              {{-- formulario factura --}}
              <form role="form text-left" action="{{ route('facturacion.store') }}" method="POST" novalidate>
                @csrf

                <!-- Campo select para la empresa emisora -->
                <div class="mb-4" >
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="emisor_id">
                      Empresa Emisora
                        </label>
                    <select id="emisor_id" name="emisor_id" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                          @foreach($emisores as $emisor)
                              <option value="{{ $emisor->id }}">{{ $emisor->razon_Social }}</option>
                          @endforeach
                      </select>
                </div>

                <!-- Campo select para el receptor -->
                <div class="mb-4">
                  <label for="receptor_id" class="block text-gray-700 text-sm font-bold mb-2">RFC Receptor</label>
                  <select class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" id="receptor_id" name="receptor_id">
                      @foreach($receptores as $receptor)
                          <option value="{{ $receptor->id }}">{{ $receptor->rfc }}</option>
                      @endforeach
                  </select>
              </div>

              <!-- Campo para el folio de factura -->
              <div class="mb-3">
                  <label for="folio" class="block text-gray-700 text-sm font-bold mb-">Folio Factura</label>
                  <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" id="folio" name="folio">
              </div>

              {{-- Agregamos campo oculto para la subida de archivo pdf --}}
              <div class="mb-4">
                  <input name="archivopdf" type="hidden" id="archivopdf" value="{{ old('value') }}" />
                  @error('archivopdf')
                      <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </p>
                  @enderror
              </div>

            {{-- Agregamos campo oculto para la subida de archivo xml --}}
              <div class="mb-4">
                  <input name="archivoxml" type="hidden" id="archivoxml" value="{{ old('value') }}" />
                  @error('archivoxml')
                      <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </p>
                  @enderror
              </div>

              <!-- Botón para enviar el formularioAquí tienes la paotón para enviar el formulario -->
              <div class="mb-3">
                  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Crear Factura</button>
              </div>
                
                
              </form>

              
            {{-- Form para la subida de archivos --}}
              <div class="w-full max-w-sm mx-2 mb-4 bg-white p-8 rounded-md shadow-sm shadow-black">

                  {{-- !Este es para la subida de pdf --}}
                  <div class="my-5">
                      <form action="{{ route('archivospdf.store') }}" method="POST" enctype="multipart/form-data"
                          id="dropzonepdf"
                          class="dropzone border-dashed border-2 w-100 h-100 rounded flex justify-center items-center">
                          @csrf
                      </form>
                  </div>

            {{-- !Este espara la subida de xml --}}
                  <div class="my-5">
                      <form action="{{ route('archivosxml.store') }}" method="POST" enctype="multipart/form-data"
                          id="dropzonexml"
                          class="dropzone border-dashed border-2 w-100 h-100 rounded flex justify-center items-center">
                          @csrf
                      </form>
                  </div>
              </div>


          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection