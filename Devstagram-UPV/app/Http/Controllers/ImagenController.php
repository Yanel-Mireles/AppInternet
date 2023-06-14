<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){
        // return("Desde controlador imagen");
        //idnetificar el archovo que se sube a dropzone
        $imagen = $request->file('file');
        //convertimos el arreglo input a formato JSON
        //return response()->json(['imagen' => $imagen->extension()]);

        //genrar un id unico para cada una de las imagenes que se cargan al server
        $nombreImagen = Str::uuid().".". $imagen->extension();
        //implementar intervetion image
        $imagenServidor= Image::make($imagen);
        
        //agregamos efectos de 

        $imagenServidor->fit(1000,1000);
        //movemos la imagen a un lugar fisico del server
        $imagenPath= public_path('uploads'). '/' . $nombreImagen;
        //pasamos la imagen de memoria al server
        $imagenServidor->save($imagenPath);
        //verificamos el nombre del archivo se ponga como unique
        return response()->json(['image' => $nombreImagen]); //verificar en terminal el cambio del nombre
    
    }

}
