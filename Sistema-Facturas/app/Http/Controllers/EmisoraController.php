<?php

namespace App\Http\Controllers;

use App\Models\Emisor;
use Illuminate\Http\Request;

class EmisoraController extends Controller
{
    //

    public function index()
    {
        $emisoras = Emisor::all();
        return view('auth.tablaEmpresasEmisoras', ['emisoras' => $emisoras]);
    }

    public function create()
    {
        return view('auth.emisora');
    }

   

    public function store(Request $request){
        // Validaciones del formulario de registro para esto se utilizan los "name" de los campos del formulario
        $this->validate($request, [
            'razon_Social' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'rfc' => 'required|string|min:12|max:13', // RFC con un mínimo de 12 y máximo de 13
        ]);

        // Guardar registro con relaciones (Entidad-Relacion)
        // "Post" es el nombre de la relacion, el nombre esta ubicado en el modelo user
        Emisor::create([
            'razon_Social' => $request->razon_Social,
            'email' => $request->email,
            'rfc' => $request->rfc,

        ]);

        // Redireccionando
        return redirect()->route('empresa.emisora');
    }

}
