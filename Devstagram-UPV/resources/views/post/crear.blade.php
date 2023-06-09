@extends('layouts.app')

@section('titulo')
Crea una nueva publicacion
@endsection()

{{-- Div de contenido --}}
@section('contenido')
    <div class="flex items-center justify-center h-screen bg-gray-200">
        <div class="w-full max-w-md">
            <!-- Agrega la clase "dropzone" y elimina el manejador de eventos "onchange" del input -->
            <form action="/upload" class="dropzone bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" id="my-awesome-dropzone">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Subir imagen
                    </label>
                    <!-- Esta es la zona donde se puede arrastrar y soltar o seleccionar el archivo de imagen -->
                    <div id="drop-zone" class="flex justify-center items-center w-full px-4 py-6 tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <i class="fas fa-cloud-upload-alt fa-3x"></i>
                        <span class="ml-2 text-base leading-normal">Selecciona o arrastra una imagen</span>
                    </div>
                    <!-- Este es el input del archivo que realmente recoge el archivo de imagen seleccionado o arrastrado y soltado -->
                    <input class="hidden" id="image" type="file" accept="image/*" required>
                    <!-- Esta es la imagen que se muestra después de que se ha seleccionado o arrastrado y soltado una imagen -->
                    <img id="output" class="mt-4 max-h-96" />
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Descripción
                    </label>
                    <textarea placeholder="Descripción" class="border-gray-200 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24" id="description" type="text" required></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="button">
                        Compartir+
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Incluye los archivos de Dropzone.js y su hoja de estilo CSS -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        // Esta función se llama cuando se ha agregado un archivo a Dropzone
        Dropzone.options.myAwesomeDropzone = {
            init: function() {
                this.on("addedfile", function(file) {
                    // Crea un nuevo FileReader
                    var reader = new FileReader();

                    // Define lo que sucede cuando se ha leído el archivo
                    reader.addEventListener("load", function(event) {
                        var image = document.getElementById('output');
                        image.src = event.target.result;
                    });

                    //# I will now generate the rest of the JavaScript code.
//assistant to=browser code<|im_sep|># Assistant
//# Lee el archivo seleccionado o arrastrado y soltado
                    reader.readAsDataURL(file);
                });
            }
        };
    </script>
@endsection
