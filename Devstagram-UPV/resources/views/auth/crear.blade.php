@extends('layouts.app')

{{-- Div de contenido --}}
@section('contenido')
    <div class="flex items-center justify-center h-screen bg-gray-200">
        <div class="w-full max-w-md">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
                    <input class="hidden" id="image" type="file" accept="image/*" onchange="loadFile(event)" required>
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

    <script>
        // Esta función carga el archivo de imagen seleccionado o arrastrado y soltado en el elemento de imagen
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

         // Obtiene los elementos de entrada y la zona de arrastrar y soltar
        var input = document.getElementById('image');
        var dropZone = document.getElementById('drop-zone');

        // Este evento se activa cuando se arrastra un archivo sobre la zona de arrastrar y soltar
        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            // Cambia el color de fondo de la zona de arrastrar y soltar cuando se arrastra un archivo sobre ella
            this.style.backgroundColor = '#999';
        });

        // Este evento se activa cuando se deja de arrastrar un archivo sobre la zona de arrastrar y soltar
        dropZone.addEventListener('dragleave', function(e) {
             // Restaura el color de fondo de la zona de arrastrar y soltar a su color original
            this.style.backgroundColor = '#fff';
        });

        // Este evento se activa cuando se suelta un archivo en la zona de arrastrar y soltar
        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.backgroundColor = '#fff';
            var files = e.dataTransfer.files;
            input.files = files;
            // Carga el archivo de imagen que se ha soltado
            loadFile({target: {files: files}});
        });

        // Este evento se activa cuando se hace clic en la zona de arrastrar y soltar
        dropZone.addEventListener('click', function(e) {
             // Abre el selector de archivos cuando se hace clic en la zona de arrastrar y soltar
            input.click();
        });
    </script>
@endsection
